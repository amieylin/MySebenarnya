<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title', 
        'content', 
        'image', 
        'encounter_date', 
        'name', 
        'email',
        'status'
    ];
    
    protected $casts = [
        'encounter_date' => 'date',
    ];
    
    // Status constants
    const STATUS_UNDER_REVIEW = 'under_review';
    const STATUS_VERIFIED_TRUE = 'verified_true';
    const STATUS_VERIFIED_FALSE = 'verified_false';
    
    // Get all available statuses
    public static function getStatuses()
    {
        return [
            self::STATUS_UNDER_REVIEW => 'Under Review',
            self::STATUS_VERIFIED_TRUE => 'Verified as True',
            self::STATUS_VERIFIED_FALSE => 'Verified as False',
        ];
    }
    
    // Get formatted status label
    public function getStatusLabel()
    {
        return self::getStatuses()[$this->status] ?? 'Unknown';
    }
    
    // Get status badge color class
    public function getStatusColorClass()
    {
        return [
            self::STATUS_UNDER_REVIEW => 'bg-yellow-100 text-yellow-800 border-yellow-200',
            self::STATUS_VERIFIED_TRUE => 'bg-green-100 text-green-800 border-green-200',
            self::STATUS_VERIFIED_FALSE => 'bg-red-100 text-red-800 border-red-200',
        ][$this->status] ?? 'bg-gray-100 text-gray-800 border-gray-200';
    }
}
