new Vue({
    el:"#AppCarManagement",
    data: {
        error:'',
        vehicule:{
            libelle:"",
            description:"",
            brand_id:"",
            loan:'',
            sell:''
        },
        specifications: [],
        features : [],
        medias:[],
        isLoading:false
    },

    mounted(){
        this.specifications =  JSON.parse(this.$el.dataset.specifications).map(spec => ({
            libelle: spec.libelle,
            specification_id:spec.id,
            spec_value: ''
        }));
        this.features =  JSON.parse(this.$el.dataset.features).map(f => ({
            libelle: f.libelle,
            feature_id:f.id,
            feat_value: ''
        }));
        this.medias = [];
    },

    methods:{

        cleanFields(){
            this.vehicule = {
                libelle:"",
                description:"",
                brand_id:"",
                loan:'',
                sell:''
            };
            this.specifications =  JSON.parse(this.$el.dataset.specifications).map(spec => ({
                libelle: spec.libelle,
                specification_id:spec.id,
                spec_value: ''
            }));
            this.features =  JSON.parse(this.$el.dataset.features).map(f => ({
                libelle: f.libelle,
                feature_id:f.id,
                feat_value: ''
            }));
        },
        handleFileChange(event) {
            const files = event.target.files; // Récupérer les fichiers sélectionnés

            if (files.length > 0) {
                // Convertir les fichiers en tableau et les parcourir
                Array.from(files).forEach(file => {
                    const reader = new FileReader(); // Lire chaque fichier

                    reader.onload = (e) => {
                        // Ajouter l'image au tableau medias (en base64)
                        this.medias.push({ media_path: e.target.result });
                    };
                    reader.readAsDataURL(file); // Lire le fichier comme base64
                });
            } else {
                console.log("Aucun fichier sélectionné.");
            }
        },

        // Méthode pour supprimer une image
        removeImage(index) {
            this.medias.splice(index, 1); // Retirer l'image du tableau
        },

        b64Tofile(b64, index){
            const base64Data = b64.split(',')[1]; // Extraire la partie après 'data:image/jpeg;base64,'
            const byteCharacters = atob(base64Data); // Décoder la base64 en caractères binaires
            const byteArrays = [];

            // Convertir en tableau d'octets
            for (let offset = 0; offset < byteCharacters.length; offset += 1024) {
                const slice = byteCharacters.slice(offset, offset + 1024);
                const byteNumbers = new Array(slice.length);
                for (let i = 0; i < slice.length; i++) {
                    byteNumbers[i] = slice.charCodeAt(i);
                }
                byteArrays.push(new Uint8Array(byteNumbers));
            }

            // Créer un Blob à partir du tableau d'octets
            const blob = new Blob(byteArrays, { type: 'image/jpeg' }); // Adapter le type MIME si nécessaire

            // Créer un fichier à partir du Blob
            const file = new File([blob], `image_${index}.jpg`, { type: 'image/jpeg' });
            return file;
        },

        createCarFromBackend(event) {
            const formData = new FormData();

            // Ajouter les informations de vehicule
            formData.append('vehicule[libelle]', this.vehicule.libelle);
            formData.append('vehicule[description]', this.vehicule.description);
            formData.append('vehicule[brand_id]', this.vehicule.brand_id);
            if(this.vehicule.loan){
                formData.append('vehicule[loan]', this.vehicule.loan);
            }
            if(this.vehicule.sell){
                formData.append('vehicule[sell]', this.vehicule.sell);
            }

            // Ajouter les spécifications
            this.specifications.forEach((spec, index) => {
                if(spec.spec_value !== ''){
                    formData.append(`specifications[${index}][specification_id]`, spec.specification_id);
                    formData.append(`specifications[${index}][spec_value]`, spec.spec_value);
                }
            });

            // Ajouter les fonctionnalités
            this.features.forEach((feat, index) => {
                if(feat.feat_value){
                    formData.append(`features[${index}][feature_id]`, feat.feature_id);
                    formData.append(`features[${index}][feat_value]`, feat.feat_value);
                }
            });

            // Ajouter les médias (fichiers)
            this.medias.forEach((media, index) => {
                let img = this.b64Tofile(media.media_path, index);
                formData.append(`medias[${index}][media_path]`, img);
            });

            // Effectuer la requête asynchrone pour créer le véhicule
             // Utiliser fetch pour envoyer la requête
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const self = this;
            this.isLoading = true;
            fetch('/car.create', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken, // Inclure le jeton CSRF dans l'en-tête
                },
                body: formData, // Envoie le FormData avec les fichiers
            })
            .then(response => {
                if (!response.ok) {
                    // Si la réponse est OK, on la traite, sinon on lance une erreur
                    throw new Error('Erreur lors de la requête');
                }
                return response.json(); // Convertir la réponse en JSON
            })
            .then(data => {
                // Gérer les données de la réponse
               // Afficher les données reçues
               self.isLoading = false;
                if(data.error !== undefined){
                    self.error = JSON.stringify(data.error);
                    return;
                }
                self.error = '';
                new swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Véhicule créé avec succès !',
                    showConfirmButton: false,
                    timer: 1500
                });
                location.href = "/cars.management"
            })
            .catch(err => {
                self.isLoading = false;
                self.error = err.toString();
            });
        }
    },
})
