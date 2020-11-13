<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Review Entity
 *
 * @property int $id
 * @property int $reviewer_id
 * @property int $reviewee_id
 * @property int $bidinfo_id
 * @property int $rate
 * @property string $comment
 * @property \Cake\I18n\Time $created
 * @property \App\Model\Entity\Bidinfo $bidinfo
 */
class Review extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'reviewer_id' => true,
        'reviewee_id' => true,
        'bidinfo_id' => true,
        'rate' => true,
        'comment' => true,
        'created' => true,
        'biditem' => true,
        'user' => true,
        'bidinfo' => true,
    ];
}
