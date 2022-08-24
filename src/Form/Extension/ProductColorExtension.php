<?php

declare(strict_types=1);

namespace App\Form\Extension;

use App\Entity\Product\Product;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductColorExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('color', ChoiceType::class, [
            'choices' => [
                Product::COLOR_RED => Product::COLOR_RED,
                Product::COLOR_GREEN => Product::COLOR_GREEN,
                Product::COLOR_BLUE => Product::COLOR_BLUE,
            ],
            'required' => false,
        ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }
}
