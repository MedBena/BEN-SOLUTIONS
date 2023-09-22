@php
    $title = "Add client";
@endphp
@extends('layout.index')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header  align-items-center d-flex">
                <h4 class="card-title mb-0  flex-grow-1">{{$title}}</h4>
                <div class="flex-shrink-0">
                    <a href="{{url('/database/clients/list')}}" class="btn btn-soft-info btn-sm">
                        <i class="ri-add-circle-line align-middle"></i> List clients
                    </a>
                    <a href="{{url('/database/clients/trash')}}" class="btn btn-soft-danger btn-sm">
                        <i class="ri-delete-bin-line align-middle"></i> Trash
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{url('/database/clients/addClient')}}" method="post" id="from-add-client" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <h5 class="mb-1">Client Informations</h5>
                    </div>
                    <div class="row gy-4 mb-4">
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="client_number" class="form-label">Client number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="client_number" name="client[client_number]" placeholder="Client number">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div> 
                        <div class="col-xxl-3 col-md-6">
                            <label class="form-label">Client type <span class="text-danger">*</span></label>
                            <div class="form-check mb-2">
                                <input class="form-check-input input-client-type" type="radio" name="client[type]" id="type-1" value="p">
                                <label class="form-check-label" for="type-1">
                                    Particular
                                </label>
                            </div>                            
                            <div class="form-check">
                                <input class="form-check-input input-client-type" type="radio" name="client[type]" id="type-2" value="c">
                                <label class="form-check-label" for="type-2">
                                    Company
                                </label>
                            </div>                             
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div>
                        <h5 class="mb-1">Contact Informations</h5>
                    </div>
                    <div class="row gy-4 mb-4">
                        <div class="col-xxl-3 col-md-6 input_particular">
                            <div>
                                <label for="first_name" class="form-label">First name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control input" id="first_name" name="contact[first_name]" placeholder="First name">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div> 
                        <div class="col-xxl-3 col-md-6 input_particular">
                            <div>
                                <label for="last_name" class="form-label">Last name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="last_name" name="contact[last_name]" placeholder="Last name">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>                        
                        <div class="col-xxl-3 col-md-6 input_company" style="display: none;">
                            <div>
                                <label for="company" class="form-label">Company name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="company" name="contact[company]" placeholder="Company name">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>  
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="email" name="contact[email]" placeholder="E-mail">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="contact[phone]" placeholder="Phone">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>  
                        <div class="col-xxl-3 col-md-6 input_particular">
                            <div>
                                <label for="date_birth" class="form-label">Date birth</label>
                                <input type="date" class="form-control" id="date_birth" name="contact[date_birth]">
                            </div>
                        </div>  
                        <div class="col-xxl-3 col-md-6 input_particular">
                            <label class="form-label">Sexe</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="contact[sexe]" id="sexe-1" value="1">
                                <label class="form-check-label" for="sexe-1">
                                    Male
                                </label>
                            </div>                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="contact[sexe]" id="sexe-2" value="2">
                                <label class="form-check-label" for="sexe-2">
                                    Women
                                </label>
                            </div> 
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="adresse" class="form-label">Adresse</label>
                                <textarea class="form-control" id="adresse" rows="3" name="contact[adresse]" placeholder="Adresse"></textarea>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="zip" class="form-label">ZIP code</label>
                                <input type="number" class="form-control" id="zip" name="contact[zip]" placeholder="ZIP code">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <select class="form-control" data-choices name="contact[city]" id="city">
                                    <option value="">Choose ...</option>
                                    <option value="Choice 1">Choice 1</option>
                                    <option value="Choice 2">Choice 2</option>
                                    <option value="Choice 3">Choice 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-control" data-choices name="contact[country]" id="country">
                                    <option value="">Choose ...</option>
                                    <option value="Choice 1">Choice 1</option>
                                    <option value="Choice 2">Choice 2</option>
                                    <option value="Choice 3">Choice 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="fax" class="form-label">Fax</label>
                                <input type="text" class="form-control" id="fax" name="contact[fax]" placeholder="Fax">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>  
                        <div class="col-xxl-3 col-md-6 input_company" style="display: none;">
                            <div>
                                <label for="legal_status" class="form-label">Legal status</label>
                                <input type="text" class="form-control" id="legal_status" name="contact[legal_status]" placeholder="Legal status">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6 input_company" style="display: none;">
                            <div>
                                <label for="account_number" class="form-label">Account number</label>
                                <input type="number" class="form-control" id="account_number" name="contact[account_number]" placeholder="Account number">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6 input_company" style="display: none;">
                            <div>
                                <label for="accounting_number" class="form-label">Accounting number</label>
                                <input type="number" class="form-control" id="accounting_number" name="contact[accounting_number]" placeholder="Accounting number">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>  
                        <div class="col-xxl-3 col-md-6 input_company" style="display: none;">
                            <div>
                                <label for="invoicing_address" class="form-label">Invoicing address</label>
                                <textarea class="form-control" id="invoicing_address" rows="3" name="contact[invoicing_address]" placeholder="Invoicing address"></textarea>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6 input_company" style="display: none;">
                            <div class="mb-3">
                                <label for="invoicing_city" class="form-label">Invoicing city</label>
                                <select class="form-control" data-choices name="contact[invoicing_city]" id="invoicing_city">
                                    <option value="">Choose ...</option>
                                    <option value="Choice 1">Choice 1</option>
                                    <option value="Choice 2">Choice 2</option>
                                    <option value="Choice 3">Choice 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6 input_company" style="display: none;">
                            <div>
                                <label for="invoicing_zip" class="form-label">Invoicing zip code <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="invoicing_zip" name="contact[invoicing_zip]" placeholder="Invoicing zip code">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>                    
                    <div>
                        <h5 class="mb-1">Social Media Informations</h5>
                    </div>
                    <div class="row gy-4 mb-4">
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="siteweb" class="form-label">Site WEB</label>
                                <input type="text" class="form-control" id="siteweb" name="contact[siteweb]" placeholder="Site WEB">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="linkedin" class="form-label">Linkedin lien</label>
                                <input type="text" class="form-control" id="linkedin" name="contact[linkedin]" placeholder="Linkedin lien">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="youtube" class="form-label">Youtube lien</label>
                                <input type="text" class="form-control" id="youtube" name="contact[youtube]" placeholder="Youtube lien">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="facebook" class="form-label">Facebook lien</label>
                                <input type="text" class="form-control" id="facebook" name="contact[facebook]" placeholder="Facebook lien">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="twitter" class="form-label">Twitter lien</label>
                                <input type="text" class="form-control" id="twitter" name="contact[twitter]" placeholder="Twitter lien">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="instagram" class="form-label">Instagram lien</label>
                                <input type="text" class="form-control" id="instagram" name="contact[instagram]" placeholder="Instagram lien">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row gy-4 mb-4">
                        <div class="col-xxl-3 col-md-6">
                            <button type="button" onclick="handle_add()" class="btn btn-info">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('assets/js/app/database/clients.js')}}"></script>
@endsection