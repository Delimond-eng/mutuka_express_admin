<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicule extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicules';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        "libelle",
        "description",
        "brand_id",
        "sell",
        "loan"
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * GET VEHICULE MEDIA LIST
     * @return HasMany
    */
    public function medias(): HasMany{
        return $this->hasMany(VehiculeMedia::class, foreignKey:"vehicule_id", localKey:"id");
    }

    /**
     * GET CAR BRAND
     * @return BelongsTo
    */
    public function brand() : BelongsTo{
        return $this->belongsTo(CarBrand::class, foreignKey:"brand_id");
    }


    /**
     * GET VEHICULE FEATURE
     * @return HasMany
    */
    public function features(): HasMany{
        return $this->hasMany(VehiculeFeature::class, foreignKey:"vehicule_id", localKey:"id");
    }

    /**
     * GET VEHICULE FEATURE
     * @return HasMany
    */
    public function specifications(): HasMany{
        return $this->hasMany(VehiculeSpecification::class, foreignKey:"vehicule_id", localKey:"id");
    }


    /**
     * GET LIST OF REQUEST FOR LOCATION
     * @return HasMany
    */
    public function locationRequests(): HasMany{
        return $this->hasMany(CarLocationRequest::class, foreignKey:"vehicule_id", localKey:"id");
    }


    /**
     * GET LIST OF REQUEST FOR SELL
     * @return HasMany
    */
    public function sellRequests(): HasMany{
        return $this->hasMany(SellCarRequest::class, foreignKey:"vehicule_id", localKey:"id");
    }

}
