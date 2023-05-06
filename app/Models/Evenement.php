<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Evenement
 * 
 * @property int $id
 * @property string $titre
 * @property string|null $description
 * @property Carbon $date_debut
 * @property Carbon $date_fin
 * @property string|null $lieu
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Evenement extends Model
{
	protected $table = 'evenements';

	protected $casts = [
		'date_debut' => 'datetime',
		'date_fin' => 'datetime'
	];

	protected $fillable = [
		'titre',
		'description',
		'date_debut',
		'date_fin',
		'lieu'
	];
}
