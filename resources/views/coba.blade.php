<!--Item-->
                    @foreach($perumahan->slice(0, 3) as $perum)
                    @if($perum->info)
                    <div class="col-sm-6 col-lg-4">

                        <div class="card ts-item ts-card ts-item__lg">

                            <!--Ribbon-->
                            <div class="ts-ribbon">
                                <i class="fa fa-thumbs-up"></i>
                            </div>

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="{{asset('picture/'.$perum->info->foto)}}">
                                <div class="ts-item__info-badge">Rp. {{number_format($perum->info->harga, 0, ',','.')}} Juta</div>
                                <figure class="ts-item__info">
                                    <h4>{{$perum->nama_perumahan}}</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        {{$perum->lokasi}}
                                    </aside>
                                </figure>
                            </a>

                            <!--Card Body-->
                            <div class="card-body">
                                <div class="ts-description-lists">
                                  <dl>
                                      <dt>Luas Lahan Bangunan</dt>
                                      <dd>{{$perum->luas_lahan_bangunan}} M<sup>2</sup></dd>
                                  </dl>
                                  <dl>
                                      <dt>Jumlah Rumah</dt>
                                      <dd>{{$perum->jumlah_rumah}} Unit</dd>
                                  </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="{{route('info', $perum->id)}}" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item-->
                    </div>
                    @endif
                    @endforeach
                    <!--end Item col-md-4-->

                </div>
                <!--end row-->

                <!--All properties button-->
                <div class="text-center mt-3">
                    <a href="{{url('/perumahan')}}" class="btn btn-outline-dark ts-btn-border-muted">Lihat Semua</a>
                </div>

            </div>
            <!--end container-->