<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehiculeFeature extends Model
{
    use HasFactory;


     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicule_features';

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
        "vehicule_id",
        "feature_id",
        "feat_value"
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


    public function vehicule() : BelongsTo{
        return $this->belongsTo(Vehicule::class, foreignKey:"vehicule_id");
    }

    public function feature() : BelongsTo{
        return $this->belongsTo(Feature::class, foreignKey:"feature_id");
    }
}
