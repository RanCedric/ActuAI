<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Definition
 * 
 * @property int $id
 * @property string $terme
 * @property string $definition
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Definition extends Model
{
	protected $table = 'definitions';

	protected $fillable = [
		'terme',
		'definition'
	];
}
