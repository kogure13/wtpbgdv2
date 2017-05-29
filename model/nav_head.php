<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle nav</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Brand</a>
    </div>

    <ul class="nav navbar-right top-nav">        
    </ul>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>            
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#dta-master">                    
                    Data Master                    
                </a>
                <ul id="dta-master" class="collapse">
                    <li><a href="?page=area">Data Area</a></li>
                    <li><a href="?page=blok">Data Blok</a></li>
                </ul>
            </li>
            <li>
                <a href="?page=pelanggan">Data Pelanggan</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#transaksi">                   
                    Transaksi
                </a>
                <ul id="transaksi" class="collapse">
                    <li>
                        <a href="?page=input_wm">Input Water Meter</a>
                    </li>
                    <li>
                        <a href="?page=trans_rekair">Pembayaran Rek. Air</a>
                    </li>
                </ul>
            </li>            
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#user">                    
                    User Detail                    
                </a>
                <ul id="user" class="collapse">
                    <li>
                        <a href="#">
                            <i class="fa fa-user fa-fw"></i>
                            Profile
                        </a>
                    </li>                
                    <li>
                        <a href="#">
                            <i class="fa fa-sign-out fa-fw"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>        
</nav>
