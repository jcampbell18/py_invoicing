<tr> 
        <td style="width: 1020px; height: 126px; margin: 0px; padding: 0px; border: 0px;">
            <table style="margin: 0px; border: 0px; padding: 0px; width: 1020px; height: 126px; border-collapse: collapse;">
                <tr>
                    <td style="width: 344px; height: 126px; padding: 0px; margin: 0px; border: 0px;">
                        <img src="imgs/header_left.jpg" alt="header_left.jpg" style="width: 344px; height: 126px; border: 0px; margin: 0px; padding: 0px;">
                    </td>
                    <td style="width: 382px; height: 126px; padding: 0px; margin: 0px; border: 0px; background: url('imgs/headerBG.jpg') repeat-x; color: #7e7878;">
                        &nbsp;
                    </td>
                    <td style="width: 294px; height: 126px; padding: 0px; margin: 0px; border: 0px; background: url('imgs/headerBG.jpg') repeat-x; color: #7e7878;">
                        <table style="margin: 0px; border: 0px; padding: 0px; width: 224px; height: 90px; border-collapse: collapse; vertical-align: top;">
                            <tr>
                                <td style="width: 224px; height: 90px; padding: 0px; margin: 0px; border: 0px; background: url('imgs/header_<?= $_SESSION['username']; ?>BG.jpg') no-repeat; color: #7e7878;">
                                    <table style="margin: 0px; border: 0px; padding: 0px 0px 0px 0px; width: 224px; height: 90px; border-collapse: collapse; vertical-align: top;">
                                        <tr>
                                            <td style="width: 148px; height: 14px; margin: 0px; padding: 0px 0px 0px 27px; border: 0px; background: transparent; color: #e8e8e8; font: 12px Tahoma,Arial,sans-serif;">
                                                Welcome <?= $_SESSION['username']; ?>!
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 148px; height: 12px; margin: 0px; padding: 0px 0px 0px 38px; border: 0px; background: transparent; color: #6d6b6c; font: 10px Tahoma,Arial,sans-serif;">
                                                logged in as <span style="background: transparent; color: #ffffff;"><?= $_SESSION['username_access']; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 148px; height: 12px; margin: 0px; padding: 0px 0px 0px 38px; border: 0px; background: transparent; color: #fdb301; font: 10px Tahoma,Arial,sans-serif;">
                                                <? echo date("g:ia m/d/Y"); ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table> 
        </td>
    </tr>