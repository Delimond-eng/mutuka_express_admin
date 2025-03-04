<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class CarLocationRequest extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'car_location_requests';

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
        "costumer_id",
        "vehicule_id",
        "pick_up_date",
        "pick_up_area",
        "code",
        ""
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
        'created_at'=>'datetime:d/m/Y H:i',
        'updated_at'=>'datetime:d/m/Y H:i',
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


    public static function getUniqueCode()
    {
        do {
            // Générer un code unique
            $randomCode = strtoupper(Str::random(2)); // Exemple : "A9"
            $number = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT); // Exemple : "0123"
            $code = "MTE-{$number}{$randomCode}"; // Exemple final : "MTE-0123A9"

        } while (self::where('code', $code)->exists());

        return $code;
    }


    public function vehicule() : BelongsTo{
        return $this->belongsTo(Vehicule::class, "vehicule_id");
    }

    public function costumer() : BelongsTo{
        return $this->belongsTo(Costumer::class, "costumer_id");
    }
}
