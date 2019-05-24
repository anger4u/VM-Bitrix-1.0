<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("тест");
?><?$APPLICATION->IncludeComponent("bitrix:main.auth.form", "auth", Array(
	"AUTH_FORGOT_PASSWORD_URL" => "/user/index.php",	// Страница для восстановления пароля
		"AUTH_REGISTER_URL" => "/user/registration.php",	// Страница для регистрации
		"AUTH_SUCCESS_URL" => "/user/profile.php",	// Страница после успешной авторизации
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>