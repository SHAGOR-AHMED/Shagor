<!--Container-->
    <div class="container-fluid">
        <!--subnav-->
        <div class="subnav">
            <ul class="nav nav-pills">
                <li><a href="#" onclick="javascript:Dashboard.addWidget();">+ Add Widget</a></li>
                <li><a href="dashboardprinterfriendly.html" target="_blank">Printer Friendly</a></li>
                <li><a href="#" onclick="javascript:ShowHelp()">Help</a></li>
            </ul>
        </div>
        <!--Dashboad-->
        <div id="columns" class="row-fluid">
            <ul id="widget1" class="column ui-sortable unstyled">
                <li id="Widget1" class="widget">
                    <div class="widget-head">
                        <span>Frequency & Recency</span></div>
                    <div class="widget-content">
                        <iframe id="iframeWidget1" class="widget-iframe" style="overflow: hidden;" src="widgets/widget1.html">
                        </iframe>
                    </div>
                </li>
                <li id="Widget4" class="widget">
                    <div class="widget-head">
                        <span>Avg. Visit Duration by Territory</span></div>
                    <div class="widget-content">
                        <iframe id="iframeWidget4" class="widget-iframe" style="overflow: hidden;" src="widgets/widget4.html">
                        </iframe>
                    </div>
                </li>
            </ul>
            <ul id="widget2" class="column ui-sortable unstyled">
                <li id="Widget2" class="widget">
                    <div class="widget-head">
                        <span>Daily Visits</span></div>
                    <div class="widget-content">
                        <iframe id="iframeWidget3" class="widget-iframe" style="overflow: hidden;" src="widgets/widget3.html">
                        </iframe>
                    </div>
                </li>
                <li id="Widget5" class="widget">
                    <div class="widget-head">
                        <span>Visits and Pageviews by Devices</span></div>
                    <div class="widget-content">
                        <iframe id="iframeWidget5" class="widget-iframe" style="overflow: hidden;" src="widgets/widget5.html">
                        </iframe>
                    </div>
                </li>
            </ul>
            <ul id="widget3" class="column ui-sortable unstyled">
                <li id="Widget3" class="widget">
                    <div class="widget-head">
                        <span>Visits by Traffic Type</span></div>
                    <div class="widget-content">
                        <iframe id="iframeWidget2" class="widget-iframe" style="overflow: hidden;" src="widgets/widget2.html">
                        </iframe>
                    </div>
                </li>
                <li id="Widget6" class="widget">
                    <div class="widget-head">
                        <span>Live Random Data</span></div>
                    <div class="widget-content">
                        <iframe id="iframeWidget6" class="widget-iframe" style="overflow: hidden;" src="widgets/widget6.html">
                        </iframe>
                    </div>
                </li>
            </ul>
        </div>
    </div>