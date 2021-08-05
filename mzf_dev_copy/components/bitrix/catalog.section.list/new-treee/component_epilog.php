<?$i = 0;?>


    <div class="accordion" id="accordionMenu">
    <?
    $TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
    $CURRENT_DEPTH = $TOP_DEPTH;

    foreach($arResult["SECTIONS"] as $arSection)
    {
    $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
    $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
    if($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"])
    {

        if($arSection["DEPTH_LEVEL"] > 2 ){
            echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH),'<div id="collapse-'.($i-1).'" class="accordion-collapse collapse" aria-labelledby="heading-'.($i-1).'" data-bs-parent="#accordionMenu"><div class="accordion-collapse-inner" data-scrollbar><div class="accordion-body"><ul class="accordion-menu">';
        } else {
            echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH),"<ul>";
        }
    }
    elseif($CURRENT_DEPTH == $arSection["DEPTH_LEVEL"])
    {
        echo "</li>";
    }
    else
    {
        while($CURRENT_DEPTH > $arSection["DEPTH_LEVEL"])
        {
            echo "</li>";
            if($arSection["DEPTH_LEVEL"] > 2){
                echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul></div></div></div>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
            } else {
                echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
            }


            $CURRENT_DEPTH--;
        }
        echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</li>";
    }

    $count = $arParams["COUNT_ELEMENTS"] && $arSection["ELEMENT_CNT"] ? "&nbsp;(".$arSection["ELEMENT_CNT"].")" : "";

    if ($_REQUEST['SECTION_ID']==$arSection['ID'])
    {
        $link = '<b>'.$arSection["NAME"].$count.'</b>';
        $strTitle = $arSection["NAME"];
    }
    else
    {
        if($arSection["DEPTH_LEVEL"] > 1) {
            $link = '<a href="'.$arSection["SECTION_PAGE_URL"].'">'.$arSection["NAME"].'</a>';
        }

    }

    echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH);
    ?>
    <?if($arSection["DEPTH_LEVEL"] == 1):?>
    <?
    $url = $APPLICATION->GetCurPage();
    if(strpos($url, str_replace('/','',$arSection["SECTION_PAGE_URL"]))){
        $class='style="display:block"';
    } else {
        $class='style="display:none"';
    }
    ?>
    <li <?=$class?>  data-url="<?=$url?>" data-href="<?=$arSection["SECTION_PAGE_URL"]?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
        <?elseif($arSection["DEPTH_LEVEL"] == 2):?>

    <li class="accordion-item" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
         <?else:?>
        <li>
        <?endif;?>

        <?if($arSection["DEPTH_LEVEL"] == 2):?>
            <?
            echo '
			
			<h2 class="accordion-header" id="heading-'.$i.'">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-'.$i.'" aria-expanded="true" aria-controls="collapse-<'.$i.'">
                        
                            '.$arSection["NAME"].'
                        </button>
                    </h2>
			';
            ?>
        <?else:?>
<?if($arSection["DEPTH_LEVEL"] > 1):?>
            <?=$link?>
        <?endif;?>

        <?endif;?>


        <?

        $CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
        $i++;
        }


        ?>
</div>
<?=($strTitle?'<br/><h2>'.$strTitle.'</h2>':'')?>