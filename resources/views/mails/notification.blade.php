<?php
/**
 * @var App\Models\UserSurvey $userSurvey
 */
?>
<p>
    <?=$userSurvey->survey->mail_description?>
</p>
<p>
    <a href="<?=$userSurvey->getLink()?>">Pass poll</a>
</p>