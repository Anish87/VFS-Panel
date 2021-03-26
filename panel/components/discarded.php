<div class="col-md-8 text-center">
                        <div class="row">
                            <h1>Statistics</h1>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="card bg-custom col-md-6" style="background: none;">
                                <div class="card-header" style="background: #004fea;">
                                    <h4>DEATHMATCH</h4>   
                                </div>
                                <div class="card-body" style="background: #131313;">
                                    <div class="card-text">
                                        <ul class="mt-3" style="list-style: none; text-align: left; margin-left: 20px;">
                                            <li>Kills: <?php echo ''.$qq["Kills"].''; ?></li>
                                            <li>Deaths: <?php echo ''.$qq["Deaths"].''; ?></li>
                                            <li>K/D Ratio: <?php echo ShowRatio($qq["Kills"], $qq["Deaths"]); ?></li>
                                            <li>Sprees: <?php echo ''.$qq["Sprees"].''; ?></li>
                                            <li>Top Spree: <?php echo ''.$qq["TopSpree"].''; ?></li>
                                            <li>Hits Taken: <?php echo ''.$qq["Hits"].''; ?></li>
                                            <li><a href="bodyStats.php">Body Stats</a></li>
                                            <li><a href="wepStats.php">Weapon Stats</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-custom col-md-6" style="background: none;">
                                <div class="card-header" style="background: #004fea;">
                                    <h4>FREEROAM</h4>   
                                </div>
                                <div class="card-body" style="background: #131313;">
                                    <div class="card-text">
                                        <ul class="mt-3" style="list-style: none; text-align: left; margin-left: 20px;">
                                            <li>Respect Points: <?php echo $freeroam['Respect']; ?></li>
                                            <li>Missions Attempted: <?php echo $freeroam['MissionsAttempted']; ?></li>
                                            <li>Missions Completed: <?php echo $freeroam['MissionsDone']; ?></li>
                                            <li>Days Passed: <?php echo $freeroam['DaysPassed']; ?></li>
                                            <li>Rampages Done: <?php echo $freeroam['Rampages']; ?></li>
                                            <li>Jumps Done: <?php echo $freeroam['Jumps']; ?></li>
                                            <li>Stacks Collected: <?php echo $freeroam['Stacks']; ?></li>
                                            <li>Distance on Foot: <?php echo $freeroam['DistOnFoot']; ?></li>
                                            <li>Distance by Vehicle: <?php echo $freeroam['DistByVeh']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center mt-3">
                            <div class="card bg-custom col-md-6" style="background: none;">
                                <div class="card-header" style="background: #004fea;">
                                    <h4>RACE</h4>   
                                </div>
                                <div class="card-body" style="background: #131313;">
                                    <div class="card-text">
                                        <!-- <ul class="mt-3" style="list-style: none; text-align: left; margin-left: 20px;">
                                            <li></li>
                                        </ul> -->
                                        <center>
                                                <h1>COMING SOON!</h1>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-custom col-md-6" style="background: none;">
                                <div class="card-header" style="background: #004fea;">
                                    <h4>ROLEPLAY</h4>   
                                </div>
                                <div class="card-body" style="background: #131313;">
                                    <div class="card-text">
                                        <ul class="mt-3" style="list-style: none; text-align: left; margin-left: 20px;">
                                            <li>Robskills: <?php echo ''.$qq["Robskills"].''; ?></li>
                                            <li>Copskills: <?php echo ''.$qq["Copskills"].''; ?></li>
                                            <li>Collection Skills: </li>
                                            <li>Successful Smuggles: <?php echo ''.$qq["Smuggled"].''; ?></li>
                                            <li>Fishing Skills: </li>
                                            <li>Pizza Delivery Skills: </li>
                                            <li></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>