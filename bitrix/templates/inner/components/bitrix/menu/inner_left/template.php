<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <div class="sb_nav">
        <ul>

            <?$previousLevel = 0;
            foreach($arResult as $arItem):?>

            <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
            <?endif?>

            <?if ($arItem["IS_PARENT"]):?>
            <li class="close <?if ($arItem["SELECTED"]):?>current<?endif?>"><a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a>
                <span class="sb_showchild"></span>
                <ul>

                    <?else:?>

                        <?if ($arItem["PERMISSION"] > "D"):?>

                            <li <?if ($arItem["SELECTED"]):?>class="current"<?endif?>><a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a></li>

                        <?else:?>

                            <li class="denied"><a href="" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><span><?=$arItem["TEXT"]?></span></a></li>

                        <?endif?>

                    <?endif?>

                    <?$previousLevel = $arItem["DEPTH_LEVEL"];?>

                    <?endforeach?>

                    <?if ($previousLevel > 1)://close last item tags?>
                        <?=str_repeat("</ul></li>", ($previousLevel-1) );?>
                    <?endif?>
                </ul>
    </div>
<?endif?>