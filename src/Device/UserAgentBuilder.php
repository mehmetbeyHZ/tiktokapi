<?php


namespace TikTokAPI\Device;

use TikTokAPI\Constants;

class UserAgentBuilder
{

    /**
     * @return string
     */
    public static function build() : string
    {
        $randomPhone         = self::randomPhoneName();
        $androidSDKINT       = self::androidVersion();
        return sprintf('com.zhiliaoapp.musically/%s (Linux; U; Android %s; tr_TR; %s; Build/M1AJB; Cronet/58.0.2991.0)', Constants::MANIFEST_VERSION_CODE, $androidSDKINT, $randomPhone['model_number']);
    }

    /**
     * @return string
     */
    public static function cpuHardware(): string
    {
        $hardware = ['exynos9610','samsungexynos8890','qcom','hi3660','hi6250'];
        return $hardware[array_rand($hardware)];
    }

    /**
     * @return string
     */
    public static function androidVersion(): string
    {
        $versions = ['5.1', '6.0', '7.0', '7.1', '8.0', '8.1', '9'];
        return $versions[array_rand($versions)];
    }

    /**
     * @return array|string[]
     */
    public static function buildDPI(): array
    {
        $dpi = [
            [
                'dpi' => '380dpi',
                'wh'  => '1080x1920'
            ],
            [
                'dpi' => '640dpi',
                'wh'  => '1440x2392',
            ],
            [
                'dpi' => '640dpi',
                'wh'  => '1440x2560'
            ],
            [
                'dpi' => '431dpi',
                'wh'  => '1080x2280'
            ]
        ];
        return $dpi[array_rand($dpi)];
    }

    /**
     * @param $android
     * @return int
     */
    public static function apiLevel($android): int
    {
        switch ($android) {
            case '5.1':
                return 22;
                break;
            case '6.0':
                return 23;
                break;
            case '7.0':
                return 24;
                break;
            case '7.1':
                return 25;
                break;
            case '8.0':
                return 26;
                break;
            case '8.1':
                return 27;
                break;
            case '9':
                return 28;
                break;
        }
        return 28;
    }

    /**
     * @return array
     */
    public static function randomPhoneName(): array
    {
        $phones = self::phones();

        $selectPhone = array_rand($phones);
        $selectModel = array_rand($phones[$selectPhone]);
        $selectModelNumber = $phones[$selectPhone][$selectModel][array_rand($phones[$selectPhone][$selectModel])];

        return [
            'phone_brand' => $selectPhone,
            'phone_model' => $selectModel,
            'model_number' => $selectModelNumber
        ];
    }

    /**
     * @return array|string[]
     */
    public static function phones(): array
    {
        return [
            'SAMSUNG' => [
                'GALAXY A9' => [
                    'SM-A9000',
                    'SM-A9100',
                    'SM-A910F',
                ],
                'GALAXY A8' => [
                    'SM-A810S',
                    'SM-A8000',
                    'SM-A800F',
                    'SM-A800I',
                    'SM-A800J',
                    'SM-A800S',
                    'SM-A800YZ'
                ]
            ]
        ];
    }

    public static function devices() : array
    {
        return [
            ["ZTE", "BladeMaxViewLTEUSZ610DL", "1080x2160", "402"],
            ["LG", "X212TALAristo2PlusLTEUS", "720x1280", "294"],
            ["LG", "L413DLPremierProLTE", "720x1280", "277"],
            ["LG", "X410ULMGKSeriesK30LTEUS", "720x1280", "277"],
            ["LG", "X410ULMLKSeriesK30LRALTEUS", "720x1280", "277"],
            ["Poptel", "P9000MAXTD-LTE", "1080x1920", "401"],
            ["LG", "X210ULMAKSeriesK8+2018ACGLTEUS", "720x1280", "294"],
            ["LG", "LMX210CMRRisio3LTEUS", "720x1280", "294"],
            ["LG", "X210ULMKSeriesK8+2018LTEUS", "720x1280", "294"],
            ["LG", "LMX210CMFortune2LTEUS/KSeriesK82018", "720x1280", "294"],
            ["LG", "LMX410UMKSeriesK30XfinityMobileLTE", "720x1280", "277"],
            ["LG", "LMX410TKKSeriesK30LTE", "720x1280", "277"],
            ["LG", "X210ULMGKSeriesK82018LTEUS", "720x1280", "294"],
            ["Sonim", "XP8DualSIMTD-LTE", "1080x1920", "441"],
            ["TP-Link", "NeffosC5sDualSIMLTEAMTP704C", "480x854", "196"],
            ["Blu", "VivoXDualSIMLTE-AV0230WW", "720x1440", "268"],
            ["Blu", "V0210WWVivoXL3PlusDualSIMLTE", "720x1440", "268"],
            ["Blu", "VivoONEPlusDualSIMLTE", "720x1440", "268"],
            ["NUU", "G3DualSIMLTE-AN5702L", "720x1440", "282"],
            ["LG", "X210VPPZone4LTEUS", "720x1280", "294"],
            ["Alcatel", "5DualSIMLTEAM5086A", "720x1440", "282"],
            ["Blu", "PureViewLTE-ADualSIMP0050WW", "720x1440", "282"],
            ["Blu", "V0230WWVivoXDualSIMLTE", "720x1440", "268"],
            ["Asus", "ZenFoneMaxPlusDualSIMTD-LTEAMVersionCZB570TL", "1080x2160", "424"],
            ["Blu", "V0270WWVivoONEDualSIMLTE", "720x144", "134"],
            ["Razer", "PhoneLimitedGoldEditionGlobalTD-LTERZ35-0215", "1440x2560", "513"],
            ["TP-Link", "NeffosY5sDualSIMLTEAMTP804C", "720x1280", "294"],
            ["Sony", "XperiaL2LTE-AAMH3321", "720x1280", "267"],
            ["LG", "LMX210MAAristoLTEUS", "720x1280", "294"],
            ["Huawei", "Honor7XDualSIMTD-LTENA32GBBND-L24", "1080x2160", "407"],
            ["TP-Link", "NeffosC7DualSIMLTEAMTP910C", "720x1280", "268"],
            ["Alcatel", "VersoLTE", "480x854", "196"],
            ["LG", "SP200TributeDynastyTD-LTE", "720x1280", "294"],
            ["Blu", "D0090WWDashL5LTEDualSIM", "480x854", "196"],
            ["Samsung", "SM-J326AZGalaxySol2LTEUS", "720x1280", "295"],
            ["Meizu", "m6noteDualSIMTD-LTEUSM721L", "1080x1920", "403"],
            ["LEAGOO", "MSeriesM9DualSIM", "720x1440", "294"],
            ["Blu", "R2GlobalDualSIMLTE32GBR0170WW", "720x1280", "282"],
            ["Blu", "R2PlusDualSIMLTE", "1080x1920", "401"],
            ["Blu", "D0050UUDashL4LTEDualSIM", "480x800", "233"],
            ["LEAGOO", "TSeriesT5cDualSIMTD-LTE", "1080x1920", "403"],
            ["Asus", "ZenFone4Max5.2DualSIMTD-LTETWJPHKAMZC520KL32GB", "720x1280", "283"],
            ["NUU", "X5DualSIMLTEINIDAM", "1080x1920", "401"],
            ["ZTE", "Z999AxonMLTE-AUS", "1080x1920", "424"],
            ["Blu", "LifeOneX3DualSIMLTE", "1080x1920", "401"],
            ["OnePlus", "5TDualSIMGlobalTD-LTEA501064GB", "1080x2160", "402"],
            ["OnePlus", "5TDualSIMGlobalTD-LTEA5010128GB", "1080x2160", "402"],
            ["Asus", "ZenFoneVLiveLTEV500KL", "720x1280", "294"],
            ["ZTE", "Z851MOverture3LTEUS", "480x854", "196"],
            ["Samsung", "SM-G892UGalaxyS8ActiveTD-LTE", "1440x2960", "569"],
            ["LG", "H932UV30+TD-LTE", "1440x2880", "537"],
            ["T-Mobile", "REVVLPlusLTEUS", "1080x1920", "367"],
            ["Razer", "PhoneGlobalTD-LTERZ35-0215", "1440x2560", "513"],
            ["Blu", "Vivo8LDualSIMLTE", "720x1280", "277"],
            ["LEAGOO", "SSeriesS8ProDualSIMTD-LTE", "1080x2160", "403"],
            ["LG", "SP320XSeriesXChargeTD-LTE", "720x1280", "267"],
            ["ZTE", "Z557BLZFiveGLTEUS", "480x854", "196"],
            ["ZTE", "Z558VLZFiveCLTEUS", "480x854", "196"],
            ["LG", "US700Q6AmazonPrimeExclusiveLTE-A16GB", "1080x2160", "441"],
            ["LG", "US997UG6+AmazonPrimeExclusiveLTE-A", "1440x2880", "564"],
            [
                "LG",
                "US601XSeriesXChargeAmazonPrimeExclusiveLTE-A/XPower2",
                "720x1280",
                "267"
            ],
            ["LG", "AS998V30ACGLTE-A", "1440x2880", "537"],
            ["ZTE", "Z965BladeXLTE", "720x1280", "267"],
            ["PlumMobile", "Gator4", "720x1280", "294"],
            ["NUU", "A4LDualSIMLTEEUAM", "480x854", "196"],
            ["RIM", "BlackBerryMotionLTE-AAMBBD100-2", "1080x1920", "403"],
            ["NUU", "M3DualSIMLTEEUAM16GB", "720x1280", "267"],
            ["Blu", "GrandM2DualSIMLTEG190EQ/G190Q", "480x854", "188"],
            ["Asus", "ZenFone4SelfieProDualSIMLTEUSBRZD552KL", "1080x1920", "403"],
            ["Huawei", "H1711AscendXT2LTE-ATOR-A1", "720x1280", "268"],
            ["Alcatel", "OneTouchIdol5LTEUS6060C", "1080x1920", "424"],
            ["Asus", "ZenFone4Max5.5DualSIMLTEAMZC554KL16GB", "1080x1920", "401"],
            ["LG", "L164VLFiesta2LTE-A", "720x1280", "267"],
            ["LEAGOO", "SSeriesS8DualSIMTD-LTE", "720x1440", "284"],
            ["LG", "L163BLFiesta2LTE-A", "720x1280", "267"],
            ["Huawei", "GWMetalDualSIMLTENATRT-L53/Y7Prime", "720x1280", "268"],
            ["Asus", "ZenFone4DualSIMLTE-AAMZE554KL", "1080x1920", "403"],
            ["ZTE", "Z851Prelude+LTEUS/PreludePlus", "480x854", "196"],
            ["Blu", "S1DualSIMTD-LTE-AS0320WW", "720x1280", "283"],
            ["LG", "H932V30TD-LTE/H932PR", "1440x2880", "537"],
            ["LG", "LS998UV30+TD-LTE/LS998", "1440x2880", "537"],
            ["ZTE", "TempoXTD-LTEN9137", "480x854", "196"],
            ["ZTE", "N9517BladeForceTD-LTE", "720x1280", "267"],
            ["ZTE", "Z852Fanfare3LTEUS", "480x854", "196"],
            ["ZTE", "Z839BladeVantageLTE", "480x854", "196"],
            ["LG", "US998V30LTE-A64GB", "1440x2880", "537"],
            ["LG", "VS996V30TD-LTE", "1440x2880", "537"],
            ["LG", "VS996V30TD-LTE", "1440x2880", "537"],
            ["LG", "H931V30TD-LTE", "1440x2880", "537"],
            ["LEAGOO", "TSeriesT5THFCLimitedEditionDualSIMTD-LTE", "1080x1920", "403"],
            ["NUU", "M2DualSIMLTEEUAM", "720x1280", "294"],
            ["Samsung", "SM-S737TLGalaxyJ7SkyPro4GLTE-A", "720x1280", "267"],
            ["Motorola", "MotoX4DualSIMTD-LTEAM32GBXT1900-7", "1080x1920", "430"],
            ["LEAGOO", "KiiciaMixDualSimTD-LTE", "1080x1920", "403"],
            ["Motorola", "MotoX4TD-LTENA32GBXT1900-1", "1080x1920", "430"],
            ["Asus", "ZenFoneVXLTEV520KL", "1080x1920", "424"],
            ["Nokia", "8DualSIMTD-LTEAM", "1440x2560", "557"],
            [
                "RIM",
                "BlackBerryKEYoneBlackEditionBBB100-1TD-LTEUSV1AMAPAC64GB",
                "1080x1620",
                "435"
            ],
            ["Asus", "ZenFone4Max5.2DualSIMTD-LTETWHKAMZC520KL16GB", "720x1280", "283"],
            ["Essential", "PhonePH-1TD-LTE", "1312x2560", "504"],
            ["Motorola", "MotoG5SPlusTD-LTENA64GBXT1806", "1080x1920", "403"],
            ["Samsung", "SM-N950U1GalaxyNote8TD-LTEUS", "1440x2960", "523"],
            ["Asus", "ZenFone4ProDualSIMTD-LTEAMZS551KL64GB", "1080x1920", "403"],
            ["Motorola", "MotoG5SPlusTD-LTENA32GBXT1806", "1080x1920", "403"],
            ["Samsung", "SM-N950UGalaxyNote8TD-LTEUS", "1440x2960", "523"],
            ["LEAGOO", "PSeriesP1DualSIM", "720x1280", "294"],
            ["Caterpillar", "CATS31LTEUS", "720x1280", "313"],
            ["Caterpillar", "CATS41DualSIMLTE-AAM", "1080x1920", "441"],
            ["Alcatel", "A30FierceLTE5049Z", "720x1280", "267"],
            ["ZTE", "Z835Maven3LTE", "480x854", "196"],
            ["Samsung", "SM-G892AGalaxyS8ActiveTD-LTE", "1440x2960", "569"],
            ["Motorola", "MotoZ2ForceEditionLTE-AXT1789-02", "1440x2560", "537"],
            ["ZTE", "Z982BladeZMaxLTE-A", "1080x1920", "367"],
            [
                "Motorola",
                "MotoZ2ForceEditionLTE-AXT1789-01/MotoZForce2ndgen",
                "1440x2560",
                "537"
            ],
            ["T-Mobile", "REVVLLTEUS", "720x1280", "267"],
            ["Asus", "ZenFoneARDualSIMLTE-ANA64GBZS571KL", "1440x2560", "515"],
            ["HTC", "U11TD-LTENA128GBU-3f", "1440x2560", "534"],
            ["Archos", "Sense50dcLTEDualSIM", "720x1280", "294"],
            ["Nokia", "3DualSIMTD-LTELATAM", "720x1280", "294"],
            ["Nokia", "3TD-LTELATAM", "720x1280", "294"],
            ["Motorola", "MotoE4PlusTD-LTENAXT1775", "720x1280", "268"],
            ["Motorola", "MotoZ2ForceEditionTD-LTEXT1789-04", "1440x2560", "537"],
            ["Motorola", "MotoZ2ForceEditionTD-LTEXT1789-03", "1440x2560", "537"],
            ["LG", "US701XSeriesXVentureLTE-A", "1080x1920", "424"],
            ["Asus", "ZenFoneARLTE-ANA128GBZS571KL", "1440x2560", "515"],
            ["Samsung", "SM-J327R4GalaxyJ3Emerge4GLTE", "720x1280", "295"],
            ["Samsung", "SM-J727AZGalaxyHaloLTE-A", "720x1280", "267"],
            ["ZTE", "Z971BladeSparkLTE", "720x1280", "267"],
            ["Alcatel", "OneTouchIdol5STD-LTEAM6060S", "1080x1920", "424"],
            ["Blu", "S0350WWStudioJ8LTEDualSIM16GB", "720x1280", "267"],
            ["Blu", "S0350WWStudioJ8LTEDualSIM8GB", "720x1280", "267"],
            ["TP-Link", "NeffosX1LiteDualSIMLTEAMTP904C", "720x1280", "294"],
            ["Blu", "Vivo8DualSIMLTE", "1080x1920", "401"],
            ["OnePlus", "5DualSIMGlobalTD-LTEA5000128GB", "1080x1920", "401"],
            ["Alcatel", "PULSEMIXLTE", "720x1280", "283"],
            ["LG", "M701XSeriesXVentureLTE-A", "1080x1920", "424"],
            ["Nokia", "6DualSIMTD-LTEAM32GB", "1080x1920", "403"],
            ["HTC", "Desire5554GLTENA", "720x1280", "294"],
            ["LG", "H870DSUG6+DualSIMTD-LTE", "1440x2880", "565"],
            ["LEAGOO", "KiiciaPowerDualSim", "720x1280", "294"],
            ["Samsung", "SM-S327VLGalaxyJ3LunaProLTE", "720x1280", "295"],
            ["Motorola", "MotoE4TD-LTENAXT1767/MotoEGen4", "720x1280", "294"],
            ["Coolpad", "Canvas4GLTEUS3636A", "720x1280", "268"],
            ["RIM", "BlackBerryKEYoneBBB100-3TD-LTEUSV232GB", "1080x1620", "435"],
            ["Alcatel", "A30PlusLTE5049S", "720x1280", "267"],
            ["Alcatel", "A30PlusLTE5049S", "720x1280", "267"],
            ["Blu", "TankXtremeProDualSIMLTET0010UU", "720x1280", "294"],
            ["Motorola", "MotoZ2PlayTD-LTEUS32GBXT1710-02", "1080x1920", "404"],
            [
                "Samsung",
                "SM-J327VGalaxyJ3V2017XLTE/SM-J327VPPGalaxyJ3Eclipse",
                "720x1280",
                "295"
            ],
            ["Coolpad", "Defiant3632ALTEUS", "480x854", "196"],
            ["Motorola", "MotoZ2PlayTD-LTEUS64GBXT1710-06", "1080x1920", "404"],
            ["LG", "M322XSeriesXChargeXfinityMobileLTE-A/XPower2", "720x1280", "267"],
            ["Motorola", "MotoE4TD-LTENAXT1768", "720x1280", "294"],
            ["Coolpad", "Splatter4GLTEUS", "720x1280", "294"],
            ["OnePlus", "5DualSIMGlobalTD-LTEA500064GB", "1080x1920", "401"],
            ["LG", "L64VLFiestaLTE-A/XPower2", "720x1280", "267"],
            ["Motorola", "MotoE4XLTEXT1767PP", "720x1280", "294"],
            ["Samsung", "SM-J727R4GalaxyJ72017LTE-A", "720x1280", "267"],
            ["LG", "L63BLFiestaLTE-A", "720x1280", "267"],
            ["LG", "MP450Stylo3PlusLTE-A", "720x1280", "258"],
            ["LG", "TP450Stylo3PlusLTE-A/M470/M470F", "720x1280", "258"],
            ["ZTE", "N9560MAXXLTD-LTE", "1080x1920", "367"],
            ["HTC", "U11TD-LTENA64GBU-3f", "1440x2560", "534"],
            ["Sprint", "HTCU11TD-LTE", "1440x2560", "534"],
            ["LEAGOO", "MSeriesM7DualSIMVersionA", "720x1280", "268"],
            ["Samsung", "SM-J727UGalaxyJ72017LTE-A", "720x1280", "267"],
            ["LG", "M430Stylo3LTE-A", "720x1280", "258"],
            ["LG", "L84VLStylo3LTE-A", "720x1280", "258"],
            ["LG", "L83BLStylo3LTE-A", "720x1280", "258"],
            ["Samsung", "SM-J727TGalaxyJ7PrimeLTE-A/SM-J727T1", "720x1280", "267"],
            ["LG", "L59BLGraceLTE-A", "720x1280", "277"],
            ["Samsung", "SM-J727AGalaxyJ7SkyProLTE-A", "720x1280", "267"],
            ["RIM", "BlackBerryKEYoneBBB100-1TD-LTEUSV1AMAPAC32GB", "1080x1620", "435"],
            ["LG", "H700XSeriesXVentureLTE-A", "1080x1920", "424"],
            ["LG", "M400FKSeriesStylus3LTE-A/M400AR", "720x1280", "258"],
            ["ZTE", "Z983BladeXMaxLTE-A", "1080x1920", "367"],
            ["Huawei", "P10LiteLTE-AWAS-L03T", "1080x1920", "424"],
            ["LG", "M320FXSeriesXPower2LTE-A", "720x1280", "267"],
            ["LG", "AS993G6ACGLTE-A", "1440x2880", "564"],
            ["Unihertz", "JellyProDualSIMTD-LTE", "240x432", "202"],
            ["Sony", "XperiaXA1LTE-ANAG3123", "720x1280", "294"],
            ["LG", "RS501KSeriesK20LRA2017LTE", "720x1280", "278"],
            ["Samsung", "SM-J727PGalaxyJ7PerxTD-LTE", "720x1280", "267"],
            ["Samsung", "SM-G950U1GalaxyS8LTE-A", "1440x2960", "571"],
            ["Samsung", "SM-G955U1GalaxyS8+LTE-A", "1440x2960", "529"],
            ["Samsung", "SM-J327TGalaxyJ3Prime2017LTE/SM-J327T1", "720x1280", "295"],
            ["LG", "M257HarmonyLTE-A", "720x1280", "277"],
            ["Samsung", "SM-J327AZGalaxyAmpPrime2LTEUS", "720x1280", "295"],
            ["Samsung", "SM-G955UGalaxyS8+TD-LTE", "1440x2960", "529"],
            ["Samsung", "SM-G950UGalaxyS8TD-LTE", "1440x2960", "571"],
            ["Motorola", "MotoG5PlusDualSIMLTEAMXT1681", "1080x1920", "424"],
            ["LG", "M250FKSeriesK102017LTE", "720x1280", "277"],
            ["LG", "MP260KSeriesK20plus2017LTE-A", "720x1280", "277"],
            ["Sony", "XperiaXZsDualTD-LTEG8232", "1080x1920", "424"],
            ["Sony", "XperiaXA1UltraLTE-AAMG3223", "1080x1920", "367"],
            ["Motorola", "MotoG5PlusTD-LTENA32GBXT1687", "1080x1920", "424"],
            ["LG", "US997G6LTE-A/G6LRA", "1440x2880", "564"],
            [
                "Huawei",
                "P10PlusPremiumEditionDualSIMTD-LTEVKY-L29128GB",
                "1440x2560",
                "539"
            ],
            ["Huawei", "P10PlusStandardEditionTD-LTEVKY-L0964GB", "1440x2560", "539"],
            ["LG", "LS993G6TD-LTE", "1440x2880", "564"],
            ["LG", "H872G6LTE-A/H872PR", "1440x2880", "564"],
            ["LG", "H871G6LTE-A", "1440x2880", "565"],
            [
                "Motorola",
                "MotoG5PlusTD-LTENA64GBXT1687/MotoGPlus5thGen",
                "1080x1920",
                "424"
            ],
            ["Huawei", "VKY-L29", "1440x2560", "539"],
            ["LG", "TP260", "720x1280", "277"],
            ["LG", "VS988", "1440x2880", "564"],
            ["HTC", "U-1u", "1440x2560", "515"],
            ["LG", "VS501", "720x1280", "278"],
            ["Samsung", "SM-J727V", "720x1280", "267"],
            ["LG", "LS777", "258"],
            ["LG", "US215", "720x1280", "294"],
            ["Huawei", "PRAL23", "1080x1920", "424"],
            ["Huawei", "VTRL29", "1080x1920", "432"],
            ["Huawei", "VTRL09", "1080x1920", "432"],
            ["uleFone", "Power2", "1080x1920", "401"],
            ["HTC", "U1u", "1440x2560", "515"],
            ["LG", "MS210", "720x1280", "294"],
            ["LG", "M210", "720x1280", "294"],
            ["Huawei", "MHAAL00", "1080x1920", "373"],
            ["Huawei", "LONL29", "1440x2560", "534"],
            ["Zebra", "TC510K1PAZU4PUS", "720x1280", "294"],
            ["Zebra", "TC56CJ1PAZU2PUS", "720x1280", "294"],
            ["HTC", "BoltTD", "1440x2560", "534"],
            ["Huawei", "MHA-L09", "1080x1920", "373"],
            ["Huawei", "MHA-L29", "1080x1920", "373"],
            ["Huawei", "MHA-AL00", "1080x1920", "373"],
            ["LG", "US996", "1440x2560", "515"],
            ["LG", "LS997", "1440x2560", "515"],
            ["RIM", "DTEK60", "1440x2560", "534"],
            ["LG", "H918", "1440x2560", "515"],
            ["LG", "H910", "1440x2560", "515"],
            ["Google", "PixelXL", "1440x2560", "537"],
            ["Google", "Pixel", "1080x1920", "441"],
            ["Google", "PixelB", "1080x1920", "441"],
            ["Google", "PixelXL", "1440x2560", "537"],
            ["LG", "VS995S", "1440x2560", "515"]
        ];
    }

    public static function carriers() : array
    {
        return [
            ["312", "530", "Sprint Spectrum"],
            ["310", "120", "Sprint Spectrum"],
            ["316", "010", "Sprint Spectrum"],
            ["312", "190", "Sprint Spectrum"],
            ["311", "880", "Sprint Spectrum"],
            ["311", "870", "Sprint Spectrum"],
            ["311", "490", "Sprint Spectrum"],
            ["310", "160", "T-Mobile"],
            ["310", "240", "T-Mobile"],
            ["310", "660", "T-Mobile"],
            ["310", "230", "T-Mobile"],
            ["310", "31", "T-Mobile"],
            ["310", "220", "T-Mobile"],
            ["310", "270", "T-Mobile"],
            ["310", "210", "T-Mobile"],
            ["310", "260", "T-Mobile"],
            ["310", "200", "T-Mobile"],
            ["310", "250", "T-Mobile"],
            ["310", "300", "T-Mobile"],
            ["310", "280", "T-Mobile"],
            ["310", "330", "T-Mobile"],
            ["310", "800", "T-Mobile"],
            ["310", "310", "T-Mobile"],
            ["310", "012", "Verizon Wireless"],
            ["311", "280", "Verizon Wireless"],
            ["311", "485", "Verizon Wireless"],
            ["311", "110", "Verizon Wireless"],
            ["311", "285", "Verizon Wireless"],
            ["311", "274", "Verizon Wireless"],
            ["311", "390", "Verizon Wireless"],
            ["310", "010", "Verizon Wireless"],
            ["311", "279", "Verizon Wireless"],
            ["311", "484", "Verizon Wireless"],
            ["310", "910", "Verizon Wireless"],
            ["311", "284", "Verizon Wireless"],
            ["311", "489", "Verizon Wireless"],
            ["311", "273", "Verizon Wireless"],
            ["311", "289", "Verizon Wireless"],
            ["310", "004", "Verizon Wireless"],
            ["311", "278", "Verizon Wireless"],
            ["311", "483", "Verizon Wireless"],
            ["310", "890", "Verizon Wireless"],
            ["311", "283", "Verizon Wireless"],
            ["311", "488", "Verizon Wireless"],
            ["311", "272", "Verizon Wireless"],
            ["311", "288", "Verizon Wireless"],
            ["311", "277", "Verizon Wireless"],
            ["311", "482", "Verizon Wireless"],
            ["310", "590", "Verizon Wireless"],
            ["311", "282", "Verizon Wireless"],
            ["311", "487", "Verizon Wireless"],
            ["311", "271", "Verizon Wireless"],
            ["311", "287", "Verizon Wireless"],
            ["311", "276", "Verizon Wireless"],
            ["311", "481", "Verizon Wireless"],
            ["310", "013", "Verizon Wireless"],
            ["311", "281", "Verizon Wireless"],
            ["311", "486", "Verizon Wireless"],
            ["311", "270", "Verizon Wireless"],
            ["311", "286", "Verizon Wireless"],
            ["311", "275", "Verizon Wireless"],
            ["311", "480", "Verizon Wireless"],
            ["310", "560", "AT&T Wireless Inc."],
            ["310", "410", "AT&T Wireless Inc."],
            ["310", "380", "AT&T Wireless Inc."],
            ["310", "170", "AT&T Wireless Inc."],
            ["310", "150", "AT&T Wireless Inc."],
            ["310", "680", "AT&T Wireless Inc."],
            ["310", "070", "AT&T Wireless Inc."],
            ["310", "980", "AT&T Wireless Inc."]
        ];
    }
}
