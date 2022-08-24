<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Sylius\Component\Product\Model\ProductTranslationInterface;
use Webmozart\Assert\Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product")
 */
class Product extends BaseProduct
{
    public const COLOR_RED = 'red';
    public const COLOR_GREEN = 'green';
    public const COLOR_BLUE = 'blue';

    protected function createTranslation(): ProductTranslationInterface
    {
        return new ProductTranslation();
    }

    /** @var string|null */
    /** @ORM\Column(type="string", length=16, nullable=true) */
    private $color;

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): void
    {
        Assert::oneOf(
            $color,
            [
                null,
                self::COLOR_RED,
                self::COLOR_GREEN,
                self::COLOR_BLUE
            ],
            sprintf('Wrong color "%s" given.', $color),
        );

        $this->color = $color;
    }
}
