<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $tour_id
 * @property int $user_id
 * @property string $booking_date
 * @property int $number_of_people
 * @property string $total_price
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $payment_id
 * @property string $payment_status
 * @property-read \App\Models\Tour $tour
 * @property-read \App\Models\User|null $tourist
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereBookingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereNumberOfPeople($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereTourId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereUserId($value)
 */
	class Booking extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $tour_id
 * @property int $tour_guide_id
 * @property int $rating
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Tour $tour
 * @property-read \App\Models\TourGuide $tourGuide
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereTourGuideId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereTourId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereUserId($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property array<array-key, mixed>|null $type_of_tour
 * @property string|null $price
 * @property int|null $duration
 * @property int $max_participants
 * @property int $active
 * @property string|null $image_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $location
 * @property string|null $included
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $start_time
 * @property int|null $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Booking> $bookings
 * @property-read int|null $bookings_count
 * @property-read \App\Models\User|null $guide
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \App\Models\TourGuide|null $tourGuide
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $tourist
 * @property-read int|null $tourist_count
 * @method static \Database\Factories\TourFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereIncluded($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereMaxParticipants($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereTypeOfTour($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tour whereUserId($value)
 */
	class Tour extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $license_number
 * @property string $status
 * @property string|null $bio
 * @property string|null $skills
 * @property array<array-key, mixed>|null $languages
 * @property array<array-key, mixed>|null $ROO
 * @property int|null $years_experience
 * @property array<array-key, mixed>|null $prefrences
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $profile_info_completed
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tour> $tours
 * @property-read int|null $tours_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide whereLanguages($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide whereLicenseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide wherePrefrences($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide whereProfileInfoCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide whereROO($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide whereSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourGuide whereYearsExperience($value)
 */
	class TourGuide extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $role
 * @property string|null $otp
 * @property string|null $otp_expires_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tour> $bookedTours
 * @property-read int|null $booked_tours_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Booking> $bookings
 * @property-read int|null $bookings_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \App\Models\TourGuide|null $tourGuide
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tour> $tours
 * @property-read int|null $tours_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereOtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereOtpExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

