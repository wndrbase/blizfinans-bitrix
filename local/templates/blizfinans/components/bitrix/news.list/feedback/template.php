<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if (empty($arResult["ITEMS"])) return;
?>

<section class="feedback">
    <div class="center">
        <h2 class="feedback__title h2">Отзывы клиентов</h2>

        <div class="feedback__slider swiper-container-style">
            <div class="swiper-container swiper-container--feedback">
                <div class="swiper-wrapper">
                    <? foreach ($arResult["ITEMS"] as $arItem): ?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>

                        <blockquote class="swiper-slide feedback__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

                            <svg class="icon-ldquo">
                                <use xlink:href="/local/templates/blizfinans/images/sprite.svg#ldquo"/>
                            </svg>

                            <svg class="icon-rdquo">
                                <use xlink:href="/local/templates/blizfinans/images/sprite.svg#rdquo"/>
                            </svg>

                            <header class="feedback__autor">
                                <figure>
                                    <picture>
                                        <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>">
                                    </picture>

                                    <figcaption>
                                        <b><?= $arItem["NAME"] ?></b>
                                        <?= $arItem["DISPLAY_PROPERTIES"]["INFO"]["VALUE"] ?>
                                    </figcaption>
                                </figure>
                            </header>

                            <p class="feedback__text"><?= $arItem["PREVIEW_TEXT"]; ?></p>
                        </blockquote>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>