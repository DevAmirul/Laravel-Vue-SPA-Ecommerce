<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */

namespace App\Models {
/**
 * App\Models\Attribute
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AttributeOption> $attributeOption
 * @property-read int|null $attribute_option_count
 * @property-read \App\Models\ProductAttribute|null $productAttribute
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereUpdatedAt($value)
 */
    class Attribute extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\AttributeOption
 *
 * @property int $id
 * @property string $value
 * @property int $attribute_id
 * @property-read \App\Models\Attribute $attribute
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeOption whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeOption whereValue($value)
 */
    class AttributeOption extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\BillingDetails
 *
 * @property int $id
 * @property int $user_id
 * @property string $phone
 * @property string $address
 * @property string $address_2
 * @property string $city
 * @property string $state
 * @property string $zip_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\BillingDetailsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetails whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetails whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetails whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetails wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetails whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetails whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetails whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetails whereZipCode($value)
 */
    class BillingDetails extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\Brand
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $user
 * @property-read int|null $user_count
 * @method static \Database\Factories\BrandFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 */
    class Brand extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\Cart
 *
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartItem> $cartItem
 * @property-read int|null $cart_item_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 */
    class Cart extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\CartItem
 *
 * @property int $id
 * @property int $cart_id
 * @property int $product_id
 * @property int $qty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cart $cart
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereUpdatedAt($value)
 */
    class CartItem extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $slug
 * @property int $status
 * @property int $section_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Section $section
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SubCategory> $subCategory
 * @property-read int|null $sub_category_count
 * @method static \Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
    class Category extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\Comment
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property string $comment
 * @property string $replay
 * @property int $reply_by
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereReplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereReplyBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 */
    class Comment extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\ContactUs
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property int $status
 * @property int $reply_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Editor|null $editors
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereReplyBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereUpdatedAt($value)
 */
    class ContactUs extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\Coupon
 *
 * @property int $id
 * @property string $title
 * @property string $discount
 * @property string $code
 * @property int $status
 * @property string $start_date
 * @property string $expire_date
 * @property int $discount_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\DiscountType $discountType
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDiscountTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUpdatedAt($value)
 */
    class Coupon extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\DiscountPrice
 *
 * @property int $id
 * @property string $discount
 * @property int $product_id
 * @property int $discount_type_id
 * @property string $start_date
 * @property string $expire_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\DiscountType $discountType
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountPrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountPrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountPrice query()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountPrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountPrice whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountPrice whereDiscountTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountPrice whereExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountPrice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountPrice whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountPrice whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountPrice whereUpdatedAt($value)
 */
    class DiscountPrice extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\DiscountType
 *
 * @property int $id
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Coupon> $coupon
 * @property-read int|null $coupon_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DiscountPrice> $discountPrice
 * @property-read int|null $discount_price_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Offer> $offer
 * @property-read int|null $offer_count
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountType whereUpdatedAt($value)
 */
    class DiscountType extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\Editor
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $city
 * @property string $state
 * @property int $role
 * @property int $status
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ContactUs> $contactUs
 * @property-read int|null $contact_us_count
 * @method static \Database\Factories\EditorFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Editor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Editor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Editor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereUpdatedAt($value)
 */
    class Editor extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\GeneralSettings
 *
 * @property int $id
 * @property string $site_name
 * @property string $site_logo
 * @property string $site_slogan
 * @property string $email
 * @property string $address
 * @property string $phone
 * @property string|null $phone_2
 * @property string $zip_code
 * @property string $facebook
 * @property string $youtube
 * @property string $twitter
 * @property string $instagram
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings query()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings wherePhone2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereSiteLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereSiteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereSiteSlogan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereYoutube($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereZipCode($value)
 */
    class GeneralSettings extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\MailSettings
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $username
 * @property string $host
 * @property string $port
 * @property string $password
 * @property string $encryption
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MailSettings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailSettings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailSettings query()
 * @method static \Illuminate\Database\Eloquent\Builder|MailSettings whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSettings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSettings whereEncryption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSettings whereHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSettings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSettings whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSettings wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSettings wherePort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSettings whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailSettings whereUsername($value)
 */
    class MailSettings extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\Offer
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $discount
 * @property int $status
 * @property int $discount_type_id
 * @property string $start_date
 * @property string $expire_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\DiscountType $discountType
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDiscountTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereUpdatedAt($value)
 */
    class Offer extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\OfferSet
 *
 * @property int $id
 * @property int $offer_id
 * @property int $category_id
 * @property int $sub_category_id
 * @property int $brand_id
 * @property int $all_product
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand $brand
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Offer $offer
 * @property-read \App\Models\SubCategory $subCategory
 * @method static \Illuminate\Database\Eloquent\Builder|OfferSet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferSet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferSet query()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferSet whereAllProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferSet whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferSet whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferSet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferSet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferSet whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferSet whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferSet whereUpdatedAt($value)
 */
    class OfferSet extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $user_id
 * @property string $order_status
 * @property string $discount
 * @property string $subtotal
 * @property string $total
 * @property int $payment_status
 * @property int $shipping_method_id
 * @property int $shipping_different_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $orderItem
 * @property-read int|null $order_item_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingDifferentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 */
    class Order extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\OrderItem
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $qty
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereQty($value)
 */
    class OrderItem extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\PaymentType
 *
 * @property int $id
 * @property string $types
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentType whereTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentType whereUpdatedAt($value)
 */
    class PaymentType extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $sku
 * @property string $description
 * @property int $stock_status
 * @property int $qty_in_stock
 * @property string $sale_price
 * @property string $original_price
 * @property string $image
 * @property string $gallery
 * @property string $specification
 * @property string|null $product_tag
 * @property int $category_id
 * @property int $sub_category_id
 * @property int $brand_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand $brand
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductAttribute> $productAttribute
 * @property-read int|null $product_attribute_count
 * @property-read \App\Models\RevenueFromPurchaseAndSaleOfProducts|null $productPurchasedRevenue
 * @property-read \App\Models\ProductView|null $productView
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $review
 * @property-read int|null $review_count
 * @property-read \App\Models\SubCategory $subCategory
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereGallery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOriginalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereQtyInStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSpecification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStockStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 */
    class Product extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\ProductAttribute
 *
 * @property int $id
 * @property int $product_id
 * @property int $attribute_id
 * @property string $attribute_values
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attribute> $attribute
 * @property-read int|null $attribute_count
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereAttributeValues($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereUpdatedAt($value)
 */
    class ProductAttribute extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\ProductPurchasedRevenue
 *
 * @property int $id
 * @property int $product_id
 * @property string $revenue
 * @property string $cost
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|RevenueFromPurchaseAndSaleOfProducts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RevenueFromPurchaseAndSaleOfProducts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RevenueFromPurchaseAndSaleOfProducts query()
 * @method static \Illuminate\Database\Eloquent\Builder|RevenueFromPurchaseAndSaleOfProducts whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RevenueFromPurchaseAndSaleOfProducts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RevenueFromPurchaseAndSaleOfProducts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RevenueFromPurchaseAndSaleOfProducts whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RevenueFromPurchaseAndSaleOfProducts whereRevenue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RevenueFromPurchaseAndSaleOfProducts whereUpdatedAt($value)
 */
    class RevenueFromPurchaseAndSaleOfProducts extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\ProductView
 *
 * @property int $id
 * @property int $product_id
 * @property int $view_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView whereViewCount($value)
 */
    class ProductView extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\Review
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property int $rating_value
 * @property string $comment
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRatingValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUserId($value)
 */
    class Review extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\SearchedWords
 *
 * @property int $id
 * @property string $word
 * @property int $count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SearchedWords newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchedWords newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchedWords query()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchedWords whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchedWords whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchedWords whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchedWords whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchedWords whereWord($value)
 */
    class SearchedWords extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\Section
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $category
 * @property-read int|null $category_count
 * @method static \Database\Factories\SectionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Section newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section query()
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereUpdatedAt($value)
 */
    class Section extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\ShipToDifferentAddress
 *
 * @property int $id
 * @property int $user_id
 * @property string $phone
 * @property string $address
 * @property string $address_2
 * @property string $city
 * @property string $state
 * @property string $zip_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ShipToDifferentAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShipToDifferentAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShipToDifferentAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShipToDifferentAddress whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShipToDifferentAddress whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShipToDifferentAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShipToDifferentAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShipToDifferentAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShipToDifferentAddress wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShipToDifferentAddress whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShipToDifferentAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShipToDifferentAddress whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShipToDifferentAddress whereZipCode($value)
 */
    class ShipToDifferentAddress extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\ShippingMethod
 *
 * @property int $id
 * @property string $name
 * @property string $cost
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingMethod whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingMethod whereUpdatedAt($value)
 */
    class ShippingMethod extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\SubCategory
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $product
 * @property-read int|null $product_count
 * @method static \Database\Factories\SubCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereUpdatedAt($value)
 */
    class SubCategory extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string $keywords
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 */
    class Tag extends \Eloquent {}
}

namespace App\Models {
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string $gender
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BillingDetails|null $billingDetails
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $order
 * @property-read int|null $order_count
 * @property-read \App\Models\ShipToDifferentAddress|null $shipToDifferentAddress
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
    class User extends \Eloquent {}
}
