<?php

namespace App\Models;

use DateTime;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeExpired($query)
    {
        $currentDate = Carbon::now();
        $oneDayFromNow = $currentDate->copy()->addDay();

        return $query->where('remaining_quantity', '>', 0)->whereDate('expiry_date', '<', $currentDate);
    }

    public function scopeExpiryWithinDay($query)
    {
        $currentDate = Carbon::now();
        $oneDayFromNow = $currentDate->copy()->addDay();

        return $query->where('remaining_quantity', '>', 0)->whereBetween('expiry_date', [$currentDate, $oneDayFromNow]);
    }

    public function scopeExpiryWithinMinutes($query, $minutes)
    {
        $currentDate = Carbon::now();
        $minutesFromNow = $currentDate->copy()->addMinutes($minutes);

        return $query->where('remaining_quantity', '>', 0)->whereBetween('expiry_date', [$currentDate, $minutesFromNow]);
    }

    public function scopeExpiryWithinWeek($query)
    {
        $currentDate = Carbon::now();
        $oneWeekFromNow = $currentDate->copy()->addWeek();

        return $query->where('remaining_quantity', '>', 0)->whereBetween('expiry_date', [$currentDate, $oneWeekFromNow]);
    }

    public function scopeExpiryThreeMonth($query)
    {
        $currentDate = Carbon::now();
        $threeMonthsFromNow = $currentDate->copy()->addMonths(3);

        return $query->where('remaining_quantity', '>', 0)->whereBetween('expiry_date', [$currentDate, $threeMonthsFromNow]);
    }

    // protected $casts = [
    //     'created_at'  => 'date:Y-m-d',
    //     'expiry_date'  => 'date:Y-m-d',
    // ];

    // public function setPurchaseDateAttribute( $value ) {
    //     $this->attributes['purchase_date'] = (new Carbon($value))->format('d/m/y');
    // }

    // public function setCreatedAtAttribute( $value ) {
    //     $this->attributes['created_at'] = (new Carbon($value))->format('d/m/y');
    // }

    // public function setExpiryDateAttribute( $value ) {
    //     $this->attributes['expiry_date'] = (new Carbon($value))->format('d/m/y');
    // }

    public function formatDate($date) : string {
        return (new Carbon($this->$date))->format('d/m/y');
    }

    public function getExpiryDifferenceAttribute():string
    {
        $datetime1 = new DateTime($this->expiry_date);
        $datetime2 = new DateTime(today());
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        return $days;
    }

    public function getExpiryStatusAttribute():string
    {
        return $this->expiry_date > today() ? 'Valid' : 'Expired';
    }

    public function hasExpired():bool
    {
        return $this->expiry_date < today();
    }

    // function setPurchaseDateAttribute ($value):void
    // {
    //     $this->attributes['purchase_date'] = Hash::make($value);
    // }

    // function setExpiryDateAttribute ($value):void
    // {
    //     $this->attributes['expiry_date'] = Hash::make($value);
    // }
}
