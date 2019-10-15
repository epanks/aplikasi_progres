@extends('layouts.master')

@section('content')
@if(session('sukses'))
    <div class="alert alert-success" role="alert">
        {{session('sukses')}}
    </div>
@endif
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Paket</h3>

                {{-- <div class="card-tools">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addNew">
                        Add New
                        <i class="fas fa-user-plus fa-fw"></i>
                    </button>
                </div> --}}
            </div>
        
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Kode Satker</th>
                            <th>Nama Paket</th>
                            <th>Pagu</th>
                            <th>Output</th>
                            <th>Satuan Output</th>
                            <th>Outcome</th>
                            <th>Satoutcome</th>
                            <th>Progres Keuangan</th>
                            <th>Progres Fisik</th>
                            {{-- <th>Satker ID</th> --}}
                            <th>Modify</th>
                        </tr>

                    @foreach ($data_paket7 as $paket)  
                    
                        <tr>
                            <td>{{$paket->id}}</td>
                            <td>{{$paket->kdsatker}}</td>
                            <td>{{$paket->nmpaket}}</td>
                            <td class="text-right">{{number_format($paket->pagurmp)}}</td>
                            <td class="text-right">{{number_format($paket->trgoutput,2)}}</td>
                            {{-- <td>{{$paket->satoutput->nmsatoutput()}}</td> --}}
                            <td></td>
                            <td></td>
                            <td class="text-right">{{number_format($paket->paket7->progres_keu,2)}}</td>
                            <td class="text-right">{{number_format($paket->paket7->progres_fisik,2)}}</td>
                            {{-- <td></td> --}}
                            <td>
                                <a href="/paket/{{$paket->id}}/edit">
                                    <i class="fa fa-edit blue"></i>
                                </a>
                                /
                                <a href="/paket/{{$paket->id}}/delete">
                                    <i class="fa fa-trash red" onclick="return confirm('Yakin data mau dihapus')"></i>
                                </a>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                    
                </table>
                {{$data_paket->links()}}
            </div>
        
        </div>
       
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addNewLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">                    
                    <form action="/paket/create"  method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="kdsatker">Kode Satker</label>
                            <input name="kdsatker" type="text" class="form-control" id="kdsatker" placeholder="Kode Satker">
                        </div>
                        <div class="form-group">
                            <label for="nmpaket">Nama Paket</label>
                            <input name="nmpaket" type="text" class="form-control" id="nmpaket" placeholder="Nama Paket">
                        </div>
                        <div class="form-group">
                            <label for="pagurmp">Pagu</label>
                            <input name="pagurmp" type="number" class="form-control" id="pagurmp" placeholder="Pagu">
                        </div>                        
                        <div class="form-group">
                            <label for="progres_keu">Progres Keuangan</label>
                            <input name="progres_keu" type="number" class="form-control" id="progres_keu" placeholder="Progres Keuangan">
                        </div>
                        <div class="form-group">
                            <label for="progres_fisik">Progres Fisik</label>
                            <input name="progres_fisik" type="number" class="form-control" id="progres_fisik" placeholder="Progres Fisik">
                        </div>    
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>            
            </div>
        </div>
    </div>
</div>

@endsection