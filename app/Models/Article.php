<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * 
 * @property int $id
 * @property string $titre
 * @property string $contenu
 * @property string|null $image
 * @property int|null $auteur_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Auteur|null $auteur
 *
 * @package App\Models
 */
class Article extends Model
{
	protected $table = 'articles';

	protected $casts = [
		'auteur_id' => 'int'
	];

	protected $fillable = [
		'titre',
		'contenu',
		'image',
		'auteur_id'
	];

	public function auteur()
	{
		return $this->belongsTo(Auteur::class);
	}
}
