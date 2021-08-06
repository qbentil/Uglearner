<div class="col-lg-3 col-md-4 col-sm-12 m-b30">
    <div class="widget">
        <h6 class="widget-title">Search</h6>
        <div class="search-bx style-1">
            <form role="search" method="post">
                <div class="input-group">
                    <input name="text" class="form-control" placeholder="Enter your keywords..." type="text">
                    <span class="input-group-btn">
                        <button type="submit" class="fa fa-search text-primary"></button>
                    </span> 
                </div>
            </form>
        </div>
    </div>
    <div class="widget widget_archive">
        <h5 class="widget-title style-1">All Schools</h5>
        <ul>
            <?php
                $list = new Listing();
                echo $list->colleges("LIMIT 10");
            ?>
        </ul>
    </div>
    <div class="widget">
        <a href="#"><img src="assets/images/adv/adv.jpg" alt=""/></a>
    </div>
    <div class="widget recent-posts-entry widget-courses">
        <h5 class="widget-title style-1">Recent Schools</h5>
        <div class="widget-post-bx">
            <?php

                echo $list->recents_schools();

            ?>
        </div>
    </div>
</div>