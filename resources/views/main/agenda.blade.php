@extends('main.layout')

@section('title', 'Agenda Kegiatan PKK | PKK Kab. Indramayu')

<style type="text/css">
	[aria-expanded="false"] > .expanded, [aria-expanded="true"] > .collapsed {
		display: none;
	}
</style>
@section('container')


<section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <!-- <h2>Inner Page</h2> -->
        <ol>
          <li><a href="/">Home</a></li>
          <li>Agenda Kegiatan PKK</li>
        </ol>
      </div>

      <br><br>
      <div class="content">
        <div class="container">
          {{-- <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>

                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's
                    content.
                  </p>

                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
              </div>


            </div>
            <!-- /.col-md-6 -->

            <!-- /.col-md-6 -->
          </div> --}}
          <div id="accordion">
            <div class="card">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#menuone" aria-expanded="false" aria-controls="menuone">
                        <span class="collapsed"><i class="fa fa-plus"></i></span>
                        <span class="expanded"><i class="fa fa-minus"></i></span>
                        Menu 1
                    </a>
                </div>
                <div id="menuone" class="collapse">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                      <a class="card-link" data-toggle="collapse" href="#menutwo" aria-expanded="false" aria-controls="menutwo">
                        <span class="collapsed"><i class="fa fa-plus"></i></span>
                        <span class="expanded"><i class="fa fa-minus"></i></span>
                        Menu 2
                    </a>
                </div>
                <div id="menutwo" class="collapse">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse"  href="#menu3" aria-expanded="false" aria-controls="menu3">
                        <span class="collapsed"><i class="fa fa-plus"></i></span>
                        <span class="expanded"><i class="fa fa-minus"></i></span>
                        Menu 1
                    </a>
                </div>
                <div id="menu3" class="collapse">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
            </div>
        </div>
          </div>

          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    </div>
  </section>

@endsection
