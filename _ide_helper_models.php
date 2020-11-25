<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Model{
/**
 * App\Model\Chapter
 *
 * @property int $id
 * @property int $id_comicwork
 * @property int|null $chapter_number
 * @property string|null $title
 * @property string $created_at
 * @property string $updated_at
 * @property-read \App\Model\Comicwork $comic
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Image[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\View[] $views
 * @property-read int|null $views_count
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereChapterNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereIdComicwork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $release_date
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereReleaseDate($value)
 */
	class Chapter extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Comicwork
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int $id_country
 * @property string|null $author
 * @property int|null $status
 * @property string|null $publishing_company
 * @property string $publishing_year
 * @property string|null $url_image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Chapter[] $chapters
 * @property-read int|null $chapters_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\ComicworkTag[] $comicwork_tag
 * @property-read int|null $comicwork_tag_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Follow[] $follows
 * @property-read int|null $follows_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\History[] $histories
 * @property-read int|null $histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\User[] $users
 * @property-read int|null $users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\User[] $users_follow
 * @property-read int|null $users_follow_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\User[] $users_view
 * @property-read int|null $users_view_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\View[] $views
 * @property-read int|null $views_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Vote[] $votes
 * @property-read int|null $votes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork whereIdCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork wherePublishingCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork wherePublishingYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork whereUrlImage($value)
 * @mixin \Eloquent
 * @property-read \App\Model\Country|null $country
 */
	class Comicwork extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Country
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Comicwork[] $comicworks
 * @property-read int|null $comicworks_count
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @mixin \Eloquent
 */
	class Country extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Image
 *
 * @property int $id
 * @property int $id_chapter
 * @property string|null $url_image
 * @property string|null $content
 * @property-read Image $chapter
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereIdChapter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUrlImage($value)
 * @mixin \Eloquent
 */
	class Image extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Notification
 *
 * @property int $id
 * @property int|null $id_user
 * @property string|null $title
 * @property string|null $content
 * @property string|null $url
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Model\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUrl($value)
 * @mixin \Eloquent
 */
	class Notification extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Role
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $display_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @mixin \Eloquent
 */
	class Role extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Tag
 *
 * @property int $id
 * @property string|null $label
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\ComicworkTag[] $comicworkTag
 * @property-read int|null $comicwork_tag_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Comicwork[] $comicworks
 * @property-read int|null $comicworks_count
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereLabel($value)
 * @mixin \Eloquent
 */
	class Tag extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\User
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $url_image
 * @property string|null $phone
 * @property string|null $password
 * @property string|null $full_name
 * @property string|null $profile
 * @property string|null $email
 * @property int|null $sexs
 * @property string|null $date_of_birth
 * @property string|null $address
 * @property string|null $remember_token
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Comicwork[] $follow_comicworks
 * @property-read int|null $follow_comicworks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Follow[] $follows
 * @property-read int|null $follows_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\History[] $histories
 * @property-read int|null $histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Notification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Comicwork[] $view_comicworks
 * @property-read int|null $view_comicworks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\View[] $views
 * @property-read int|null $views_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Vote[] $votes
 * @property-read int|null $votes_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSexs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @mixin \Eloquent
 * @property int|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUrlImage($value)
 */
	class User extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\View
 *
 * @property int $id
 * @property int|null $id_chapter
 * @property int|null $id_user
 * @property int $id_comicwork
 * @property string $created_at
 * @property-read \App\Model\Chapter|null $chapter
 * @property-read \App\Model\Comicwork $comic
 * @property-read \App\Model\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|View newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View query()
 * @method static \Illuminate\Database\Eloquent\Builder|View whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereIdChapter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereIdComicwork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereIdUser($value)
 * @mixin \Eloquent
 */
	class View extends \Eloquent {}
}

