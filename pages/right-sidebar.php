        <?php
        	$search_type = $_GET['search_type'];
		?>

        <div class="span4">
<!--search-->
            <div class="widget">

                <h4>Search</h4>
                <form action="<?php ViewHelper::url('search') ?>" class="form-stacked" method="get">
                    <!--<input type="hidden" name="page" value="search" />-->
                    <div class="clearfix">
                    <select name="search_type" style="width:100px;">
                        <option value = "events" <?php echo ($search_type=="events") ? 'selected="selected"' : ""; ?> >Events</option>
                        <option value = "talks" <?php echo ($search_type=="talks") ? 'selected="selected"' : ""; ?>>Talks</option>
                    </select>
                    </div>
                	<div class="clearfix">
                        <div class="input">
                            <input class="xlarge" style="width:150px;" id="ttl" name="ttl" size="30" type="text" value="<?php echo $_GET['ttl']; ?>">
                        </div>
                    </div>
                    <input class="btn primary" type="submit" value="Search">
                </form>
            </div>
            <!--search-->
            <div class="widget">

                <h4>Categories</h4>

                <ul>
                    <?php if ($categories) foreach ($categories as $category): ?>
                        <li><a href="<?php ViewHelper::url('cat/' . $category['category_id']) ?>"><?php echo $category['title'] ?></a></li>
                    <?php endforeach; ?>
                </ul>

            </div>
            
             <div class="widget">

                <h4>Tags</h4>

                <ul>
                    <?php 
                    $tags=App::getRepository('Talk')->getAllTags();
                    
                    foreach ($tags as $tag): ?>
                        <li><a href="<?php ViewHelper::url('tags/' . $tag['tag']) ?>"><?php echo $tag['tag'] ?></a></li>
                    <?php endforeach; ?>
                </ul>

            </div>
			
            <div class="widget">

                <h4>Submit your event</h4>
                <p>Arranging an event that is not listed here? Let us know! We love to get the word out about events the community would be interested in.</p>
                <p style="text-align: center;">
                	<?php if (empty($_SESSION['user']['user_id'])): ?>
                		<a href="<?php ViewHelper::url('login') ?>" class="btn success">Submit your event!</a>
                	<?php else: ?>
                		<a href="<?php ViewHelper::url('add-event') ?>" class="btn success">Submit your event!</a>
                	<?php endif; ?>	
                		  	
                		
                	
                </p>


            </div>
            
            <?php
            if(App::urlParameter(1)=='event'){
            	include 'attend_sidebar.php'; 
            }?>

        </div>