<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?test_dump($arResult);?>

    <div class="nv_topnav">
        <ul>
            <li><a class="menu-img-fon" style="background-image: url(images/nv_home.png);" href="/"><span></span></a></li>
            <li><a href=""><span>Компания</span></a>
                <ul>
                    <li><a href="">Пункт 1</a></li>
                    <li><a href="">Пункт 2</a></li>
                    <li><a href="">Пункт 3</a></li>
                    <li><a href="">Пункт 4</a></li>
                </ul>
            </li>
            <li><a href=""><span>Новости</span></a></li>
            <li><a href=""><span>Каталог</span></a></li>
            <li><a href=""><span>Акции</span></a>
                <ul>
                    <li><a href="">Пункт 1</a>
                        <ul>
                            <li><a href="">Пункт 1</a></li>
                            <li><a href="">Пункт 2</a></li>
                        </ul>
                    </li>
                    <li><a href="">Пункт 2</a></li>
                    <li><a href="">Пункт 3</a></li>
                    <li><a href="">Пункт 4</a></li>
                </ul>
            </li>
            <li><a href=""><span>Партнерам</span></a></li>
            <li><a href=""><span>Контакты</span></a></li>
            <div class="clearboth"></div>
        </ul>
    </div>



<?if (!empty($arResult)):?>
<ul id="horizontal-multilevel-menu">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul>
		<?else:?>
			<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
				<ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<div class="menu-clear-left"></div>
<?endif?>