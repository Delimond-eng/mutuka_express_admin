new Vue({
    el: "#AppRequest",
    data: {
        error: "",
        costumer: {
            nom: "",
            address: "",
            phone: "",
            email: "",
            profession: "",
            latlng: "",
        },
        loan: {
            car_id: "1",
            date: "",
            hour: "00:00",
            area: "Kinshasa",
            recommandation: "",
        },
        isLoading: false,
    },

    mounted() {
        let vm = this;
        if ($("#date-picker-2").length > 0) {
            $("#date-picker-2")
                .daterangepicker({
                    singleDatePicker: true,
                    showISOWeekNumbers: true,
                    timePicker: false,
                    autoUpdateInput: true,
                    locale: {
                        format: "MMMM DD, YYYY",
                        separator: " - ",
                        applyLabel: "Apply",
                        cancelLabel: "Cancel",
                        fromLabel: "From",
                        toLabel: "To",
                        customRangeLabel: "Custom",
                        weekLabel: "W",
                        daysOfWeek: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                        monthNames: [
                            "Janvier",
                            "Février",
                            "Mars",
                            "Avril",
                            "Mai",
                            "Juin",
                            "Juillet",
                            "Août",
                            "Septembre",
                            "Octobre",
                            "Novembre",
                            "Decembre",
                        ],
                        firstDay: 1,
                    },
                    linkedCalendars: true,
                    showCustomRangeLabel: false,
                    startDate: 1,
                    endDate: moment().startOf("hour").add(24, "hour"),
                    opens: "right",
                })
                .on("apply.daterangepicker", function (event, picker) {
                    const selectedDate = picker.startDate.format("YYYY-MM-DD");
                    $("#date-picker-2").trigger("date-selected", selectedDate);
                })
                .on("date-selected", function (event, date) {
                    vm.loan.date = date;
                });
        }

        if ($("#vehicle_type").length > 0) {
            $("#vehicle_type")
                .select2({
                    minimumResultsForSearch: Infinity,
                    templateResult: formatState,
                    templateSelection: formatState,
                    width: "100%",
                })
                .on("select2:select", function (e) {
                    let selectedValue = e.params.data.id; // Récupère la valeur sélectionnée
                    vm.loan.car_id = selectedValue;
                });
        }
        if ($("#carId").length > 0) {
            this.loan.car_id = $("#carId").val();
        }
    },

    methods: {
        cleanFields() {
            this.costumer = {
                nom: "",
                address: "",
                phone: "",
                email: "",
                profession: "",
                latlng: "",
            };

            this.loan = {
                car_id: "",
                date: "",
                hour: "",
                area: "Kinshasa",
                recommandation: "",
            };
        },

        makeBookingRequest(event) {
            const formData = new FormData();

            // Ajouter les informations de vehicule
            formData.append("costumer[nom]", this.costumer.nom);
            formData.append("costumer[address]", this.costumer.address);
            formData.append("costumer[phone]", this.costumer.phone);
            formData.append("costumer[email]", this.costumer.email);
            formData.append("costumer[profession]", this.costumer.profession);
            formData.append("costumer[car_id]", this.loan.car_id);
            formData.append("costumer[latlng]", this.getGPS());
            formData.append(
                "loan[date]",
                `${this.loan.date} ${this.loan.hour}`
            );
            formData.append("loan[area]", this.loan.area);
            formData.append("loan[recommandation]", this.loan.recommandation);
            formData.append("loan[car_id]", this.loan.car_id);

            // Effectuer la requête asynchrone pour créer le véhicule
            // Utiliser fetch pour envoyer la requête
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");
            const self = this;
            this.isLoading = true;
            fetch("/booking_request", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken, // Inclure le jeton CSRF dans l'en-tête
                },
                body: formData, // Envoie le FormData avec les fichiers
            })
                .then((response) => {
                    if (!response.ok) {
                        // Si la réponse est OK, on la traite, sinon on lance une erreur
                        throw new Error("Erreur lors de la requête");
                    }
                    return response.json(); // Convertir la réponse en JSON
                })
                .then((data) => {
                    // Gérer les données de la réponse
                    // Afficher les données reçues
                    self.isLoading = false;
                    if (data.error !== undefined) {
                        self.error = JSON.stringify(data.error);
                        return;
                    }
                    self.error = "";
                    this.cleanFields();
                    const codeRequest = data.costumer.requests.code;
                    alert(
                        "La location du véhicule effectuée ! \n Votre code requête est : " +
                            codeRequest
                    );
                })
                .catch((err) => {
                    self.isLoading = false;
                    self.error = err.toString();
                });
        },

        getGPS() {
            let latlng = "";
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    latlng =
                        position.coords.latitude +
                        ":" +
                        position.coords.longitude;
                },
                function (error) {
                    latlng = "";
                }
            );
            return latlng;
        },
    },
});

function formatState(state) {
    if (!state.id) {
        return state.text;
    }
    var $state = $(
        '<span><img src="' +
            $(state.element).attr("data-src") +
            '" class="img-flag" /> ' +
            state.text +
            "</span>"
    );
    return $state;
}
