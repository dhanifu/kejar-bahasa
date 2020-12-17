@extends('layouts.admin')
@section('title', 'Contact')

@section('page-title', 'Contact')

@section('breadcrumb')
    <li class="breadcrumb-item text-muted active">Contact</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List</h4>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show wow slideInDown" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Nomor Telephone</th>
                                <th>Instagram</th>
                                <th>Facebook</th>
                                <th>Twitter</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->no_tlp}}</td>
                                <td>{{$contact->instagram}}</td>
                                <td>{{$contact->facebook}}</td>
                                <td>{{$contact->twitter}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Action">
                                        <button type="button" class="btn btn-secondary btn-sm"
                                                data-toggle="modal" data-target="#modalEdit"
                                                onclick="editData({{$contact->id}})" data-email="{{$contact->email}}"
                                                data-noTlp="{{$contact->no_tlp}}" 
                                                data-facebook="{{$contact->facebook}}"
                                                data-instagram="{{$contact->instagram}}"
                                                data-twitter="{{$contact->twitter}}">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MODAL EDIT --}}
<div class="modal fade" id="modalEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Edit Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form  method="POST" id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <label for="edit_email" class="col-md-3 col-form-label">contact</label>
                            <div class="col-md-9">
                                <input id="edit_email" type="text" class="form-control"
                                    name="email" placeholder="Email">
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <label for="edit_noTlp" class="col-md-3 col-form-label">Telphone</label>
                            <div class="col-md-9">
                                <input id="edit_noTlp" type="text" class="form-control"
                                    name="no_tlp" placeholder="Telephone">
                                <p class="text-danger">{{ $errors->first('no_tlp') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <label for="edit_instagram" class="col-md-3 col-form-label">Instagram</label>
                            <div class="col-md-9">
                                <input id="edit_instagram" type="text" class="form-control"
                                    name="instagram" placeholder="Instagram">
                                <p class="text-danger">{{ $errors->first('instagram') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <label for="edit_facebook" class="col-md-3 col-form-label">Facebook</label>
                            <div class="col-md-9">
                                <input id="edit_facebook" type="text" class="form-control"
                                    name="facebook" placeholder="Facebook">
                                <p class="text-danger">{{ $errors->first('facebook') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <label for="edit_twitter" class="col-md-3 col-form-label">Twitter</label>
                            <div class="col-md-9">
                                <input id="edit_twitter" type="text" class="form-control"
                                    name="twitter" placeholder="Twitter">
                                <p class="text-danger">{{ $errors->first('twitter') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnEdit" onclick="editSubmit()">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('js')
    <script>

        @if($errors->first('email'))
            $('.modal').modal('show');
        @endif

        
        @if($errors->first('facebook'))
            $('.modal').modal('show');
        @endif

        
        @if($errors->first('no_tlp'))
            $('.modal').modal('show');
        @endif

        
        @if($errors->first('instagram'))
            $('.modal').modal('show');
        @endif

        
        @if($errors->first('twitter'))
            $('.modal').modal('show');
        @endif

        $('#modalEdit').on('show.bs.modal', function(e){
            let button = $(e.relatedTarget);
            let email = button.data('email');
            let noTlp = button.data('noTlp');
            let facebook = button.data('facebook');
            let twitter = button.data('twitter');
            let instagram = button.data('instagram');
            let modal = $(this);

            console.log(noTlp);

            modal.find('.modal-body #edit_email').val(email);
            modal.find('.modal-body #edit_noTlp').val(noTlp);
            modal.find('.modal-body #edit_facebook').val(facebook);
            modal.find('.modal-body #edit_instagram').val(instagram);
            modal.find('.modal-body #edit_twitter').val(twitter);

        
        });

        function editData(contact_id){
            let id = contact_id;
            let url = '{{ route("admin.contact.update",":id") }}';
            url = url.replace(':id', id);
            console.log(url);
            $('#editForm').attr('action', url);
        }
        function editSubmit(){
            $('#editForm').submit();
        }
    </script>
@endsection