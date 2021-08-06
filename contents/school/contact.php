<div class="" id="contact">
            <h4>Contact info</h4>
            <?php
                    $name = str_replace("-", " ", $_GET['q']);
                    $course = new uSchool($name);

                    echo $course->contact_info();
            ?>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3448.1298878182047!2d-81.38369578541523!3d30.204840081824198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e437ac927a996b%3A0x799695b1a2b970ab!2sNona+Blue+Modern+Tavern!5e0!3m2!1sen!2sin!4v1548177305546" class="align-self-stretch d-flex" style="width:100%; min-width:100%; min-height:400px;" allowfullscreen></iframe>
        </div>