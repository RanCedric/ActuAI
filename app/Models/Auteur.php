<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Auteur
 * 
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $mot_de_passe
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Article[] $articles
 *
 * @package App\Models
 */
class Auteur extends Model
{
	protected $table = 'auteurs';

	protected $fillable = [
		'nom',
		'prenom',
		'email',
		'mot_de_passe'
	];

	public function articles()
	{
		return $this->hasMany(Article::class);
	}
}
