@foreach ($services as $data)
            <div class="block-pricing">
                <div class="table">
                <h4>{{ $data->nama }}</h4>
                <h2>Rp. {{number_format($data->harga, 0, '.', '.') }}</h2>
                <ul class="list-unstyled">
                    <li><b>4 GB</b> Ram</li>
                    <li><b>7/24</b> Tech Support</li>
                    <li><b>40 GB</b> SSD Cloud Storage</li>
                    <li>Monthly Backups</li>
                    <li>Palo Protection</li>
                </ul>
                <div class="table_btn">
                    <a href="#" class="btn"><i class="fa fa-sign-in"></i> Details</a>
                </div>
                </div>
            </div>
@endforeach
