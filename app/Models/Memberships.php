<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Memberships extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch',
        'name',
        'date_of_birth',
        'date_of_receipt',
        'class',
        'occupation',
        'front',
        'newspaper',
        'monthly_income',
        'levy_rate',
        'january',
        'february',
        'march',
        'april',
        'may',
        'june',
        'july',
        'august',
        'september',
        'october',
        'november',
        'december',
        'state_relief_fund',
        'one_half_two_day_income',
        'aid_fago',
        'comment'
    ];

    // Method to calculate age based on date_of_birth
    public function calculateAge()
    {
        // Ensure date_of_birth is a valid date
        if (!$this->date_of_birth) {
            return null; // Return null if no date_of_birth is set
        }

        $dateOfBirth = Carbon::parse($this->date_of_birth);
        $now = Carbon::now();

        // Calculate the difference
        $ageDifference = $dateOfBirth->diff($now);

        // Format the age as "X years, Y days"
        $formattedAge = sprintf("%d years,%d months, %d days", $ageDifference->y, $ageDifference->m, $ageDifference->d);

        return $formattedAge;
    }

    // Method to calculate and set age (in years) before saving to the database
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
           
            if ($model->date_of_birth) {
                // Store only the years in the 'age' column
                $dateOfBirth = Carbon::parse($model->date_of_birth);
                $model->age = $dateOfBirth->age; // Only store the years difference
            }
        });
    }
}
