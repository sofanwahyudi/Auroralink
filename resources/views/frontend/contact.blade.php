<div class="form">
            <form action="{{ route('leads.store') }}" method="post" role="form" class="contactForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anda" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="telepon" id="telepon" placeholder="Telepon Anda" data-rule="minlen:4" data-msg="Please enter your phone" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="komentar" id="komentar" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Hal Yang Ingin Anda Sampaikan"></textarea>
                            <div class="validation"></div>
                        </div>
                        <div class="text-center"><button type="submit"> <i class="fa fa-send"></i>  Send Message</button></div>
                    </form>
          </div>

