<!DOCTYPE html>
<html>

<head>
    <title>DMR Options Generator</title>
</head>

<body>
    <?php

    //This uses file_get_contents as it's a local file on the server, I would probably use CURL if pulling from a remote server to prevent a MITM attack
    $path = 'https://dvsph.net/api/TalkGroups.json';
    $jsonString = file_get_contents($path);
    $prestring = json_decode($jsonString, true);
    $string = $prestring["TalkGroups"];

    function talkgroups($string, $slot, $order)
    {




        foreach ($string as $value) {
            if ($value["Slot"] == $slot) {
                echo '<option value="TS' . $slot . '_' . $order . '=' . $value["TalkGroup"] . ';">' . $value["TalkGroup"] . " - " . $value["Description"] . "</option>";
            }
            ;
        }
    }

    ?>


    <br>

    <table id="jgxtable" style="width:95%" onchange="generate()">

        <tr>
            <th style="width:50%">Time Slot 1</th>
            <th style="width:50%">Time Slot 2</th>

        </tr>

        <tr>
            <td>


                <div class="mb-3 mt-3">
                    <label for="1tg1" class="form-label">TS 1 TG 1</label>
                    <select class="form-select" id="1tg1" name="1tg1">
                        <option value="">None</option>
                        <?php talkgroups($string, "1", "1"); ?>
                    </select>
                </div>

            </td>

            <td>


                <div class="mb-3 mt-3">
                    <label for="2tg1" class="form-label">TS 2 TG 1</label>
                    <select class="form-select" id="2tg1" name="2tg1">
                        <option value="">None</option>
                        <?php talkgroups($string, "2", "1"); ?>
                    </select>
                </div>

            </td>
        </tr>

        <tr>
            <td>


                <div class="mb-3 mt-3">
                    <label for="1tg2" class="form-label">TS 1 TG 2</label>
                    <select class="form-select" id="1tg2" name="1tg2">
                        <option value="">None</option>
                        <?php talkgroups($string, "1", "2"); ?>
                    </select>
                </div>

            </td>

            <td>


                <div class="mb-3 mt-3">
                    <label for="2tg2" class="form-label">TS 2 TG 2</label>
                    <select class="form-select" id="2tg2" name="2tg2">
                        <option value="">None</option>
                        <?php talkgroups($string, "2", "2");?>
                    </select>
                </div>

            </td>
        </tr>



        <tr>
            <td>


                <div class="mb-3 mt-3">
                    <label for="1tg3" class="form-label">TS 1 TG 3</label>
                    <select class="form-select" id="1tg3" name="1tg3">
                        <option value="">None</option>

                        <?php talkgroups($string, "1", "3"); ?>
                    </select>
                </div>

            </td>

            <td>


                <div class="mb-3 mt-3">
                    <label for="2tg3" class="form-label">TS 2 TG 3</label>
                    <select class="form-select" id="2tg3" name="2tg3">
                        <option value="">None</option>
                        <?php talkgroups($string, "2", "3"); ?>
                    </select>
                </div>

            </td>
        </tr>




        <tr>
            <td>


                <div class="mb-3 mt-3">
                    <label for="1tg4" class="form-label">TS 1 TG 4</label>
                    <select class="form-select" id="1tg4" name="1tg4">
                        <option value="">None</option>
                        <?php talkgroups($string, "1", "4"); ?>
                    </select>
                </div>

            </td>

            <td>


                <div class="mb-3 mt-3">
                    <label for="2tg4" class="form-label">TS2 TG 4</label>
                    <select class="form-select" id="2tg4" name="2tg4">
                        <option value="">None</option>
                        <?php talkgroups($string, "2", "4"); ?>
                    </select>
                </div>

            </td>
        </tr>


        <tr>
            <td>


                <div class="mb-3 mt-3">
                    <label for="1tg5" class="form-label">TS 1 TG 5</label>
                    <select class="form-select" id="1tg5" name="1tg5">
                        <option value="">None</option>
                        <?php talkgroups($string, "1", "5"); ?>
                    </select>
                </div>

            </td>

            <td>
                <div class="mb-3 mt-3">
                    <label for="2tg5" class="form-label">TS2 TG 5</label>
                    <select class="form-select" id="2tg5" name="2tg5">
                        <option value="">None</option>
                        <?php talkgroups($string, "2", "5"); ?>
                    </select>
                </div>
            </td>
        </tr>
    </table>
    <br>
    <div id="copy">
        <button id="btn_copy" type="button" class="btn btn-primary" onclick="copyOptions()">Copy</button>
    </div><br>

    <div id="jgx"></div>


    <script>
        function generate() {
            var a = document.getElementById("1tg1").value,
                b = document.getElementById("1tg2").value,
                c = document.getElementById("1tg3").value,
                d = document.getElementById("1tg4").value,
                e = document.getElementById("1tg5").value,
                f = document.getElementById("2tg1").value,
                g = document.getElementById("2tg2").value,
                h = document.getElementById("2tg3").value,
                i = document.getElementById("2tg4").value,
                j = document.getElementById("2tg5").value;
            options = "StartRef=4000;RelinkTime=0;UserLink=0;" + a + b + c + d + e + f + g + h + i + j, document.getElementById("jgx").innerHTML = options, x.style.display = "block"
        }

        function copyOptions() {
            var e = options;
            navigator.clipboard.writeText(e).then(function () {
                console.log("Async: Copying of options string was successful!")
            }, function (e) {
                console.error("Async: Could not copy options string: ", e)
            })
        }
        var options;
        if (void 0 === options) {
            var x = document.getElementById("copy");
            x.style.display = "none"
        }
    </script>

    <!--Copyright M0JGX / DVSPH.net - This code may be used by credit MUST be given for use https://github.com/DVSPH/DMR-Options-Generator-->

    <br><small>
        Copyright M0JGX https://github.com/DVSPH/DMR-Options-Generator
        <br>

    </small>
</body>

</html>
