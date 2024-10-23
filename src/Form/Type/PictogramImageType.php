<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Form\Type;

use MonsieurBiz\SyliusMediaManagerPlugin\Form\Type\ImageType as MediaManagerImageType;
use MonsieurBiz\SyliusRichEditorPlugin\MonsieurBizSyliusRichEditorPlugin;
use Sylius\Bundle\CoreBundle\Form\Type\ImageType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class PictogramImageType
 * @package Asdoria\SyliusPictogramPlugin\Form\Type
 */
class PictogramImageType extends ImageType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('file', $this->getImageType(), [
                'label' => 'asdoria.form.pictogram_image.file',
                'data_class' => null,
                'required' => false,
                'attr' => ['data-image' => 'false'], // To be able to manage display in form
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'sylius_pictogram_image';
    }

    private function getImageType(): string
    {
        // @phpstan-ignore-next-line
        return MonsieurBizSyliusRichEditorPlugin::imageMediaManagerExists() ? MediaManagerImageType::class : FileType::class;
    }
}
