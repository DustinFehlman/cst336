<?php 
    include 'inc/functions.php';
    session_start();
    $submission = $_SESSION['csApplicant'];;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CSUMB CS Online Readiness</title>
    <style>@import url("css/styles.css");</style>
    </head>
    <body>
        <div class="wrapper">
            <div class="main-content">
                <header>
                    <img src="img/csumbRoundBlue.png">
                    <h1>Computer Science Online Readiness Check</h1>
                </header>
                <table class="form-table">
                    <td>
                        <form action="inc/process_input.php" method="get">
                            <fieldset>
                                <legend>Is your GPA currently equal to or above 2.0?</legend>
                                <input type="radio" name="gpa" value="yes" <?=getGPAYesLastInput()?>>
                                <label for="yes"> Yes</label>
                                <input type="radio" name="gpa" value="no" <?=getGPANoLastInput()?>>
                                <label for="no"> No</label>
                            </fieldset>
                             <fieldset>
                                <legend>Select the following courses you have taken:</legend>
                                <input type="checkbox" name="cst231" value="cst231" <?=getCST231LastInput()?>>
                                <label for="cst231"> CST 231: Problm-Solving/Programing</label>
                                <br>
                                <input type="checkbox" name="cst238" value="cst238" <?=getCST238LastInput()?>
                                <label for="cst238"> CST 238: Introduction to Data Structures</label>
                                <br>
                                <input type="checkbox" name="math130" value="math130" <?=getMATH130LastInput()?>>
                                <label for="math130"> MATH 130: Precalculus</label>
                            </fieldset>
                            <fieldset>
                                <legend>How many transferable semester credits do you have?</legend>
                                Credits (between 0 and 120):
                                <input type="number" name="credits" value ="<?=getCreditLastInput()?>" min="0" max="120">
                            </fieldset>
                            <fieldset>
                                <legend>Please select the state you live in:</legend>
                                State:
                                <select name="state">
                                    <?=displayStates()?>
                                </select>
                            </fieldset>
                            <div class="submission-controls">
                                <input class="submit-button" type="submit" value="Submit">
                            </div>
                        </form>
                    </td>
                    <td valign="top" class="results-td">
                    <p class="error-text"><?=showErrors()?></p>
                    <p class="results"><?=displayResult()?></p>
                    </td>
                </table>
            </div>
            <footer>
            </footer>
        </div>
    </body>
</html>