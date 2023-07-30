<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'hobbies',
        'position_id',
        'salary'
    ];

    public function fullName(): Attribute {
        return new Attribute(
            get: fn() => $this->first_name . ' ' . $this->last_name,
        );
    }

    public function formattedGender(): Attribute {
        return new Attribute(
            get: fn() => ucfirst($this->gender),
        );
    }

    public function position(): BelongsTo {
        return $this->belongsTo(Position::class);
    }

    public function formattedSalary(): Attribute {
        return new Attribute(
            get: fn() => html_entity_decode('&#8369;') . number_format($this->salary, 2),
        );
    }

    public function formattedHobbies(): Attribute {
        return new Attribute(
            get: function() {
                if($this->hobbies != null) {
                    $hobbies = explode(",", $this->hobbies);
                    $hobbies = array_map(function($hobby) {
                        return ucwords($hobby);
                    }, $hobbies);
                    $hobbies = implode(', ', $hobbies);
                    return $hobbies;
                } else {
                    return "No hobbies";
                }
            }
        );
    }

    public function formattedCreatedAt(): Attribute {
        return new Attribute(
            get: fn() => date_format(date_create($this->created_at), 'F j, Y h:i:s A')
        );
    }
}
