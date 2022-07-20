@extends('layouts.app')

@section('template_title')
    Purchase Detail
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Purchase Detail') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('purchase-details.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Id Purchese</th>
										<th>Id Product</th>
										<th>Amount</th>
										<th>Price</th>
										<th>Total</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchaseDetails as $purchaseDetail)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $purchaseDetail->id_purchese }}</td>
											<td>{{ $purchaseDetail->id_product }}</td>
											<td>{{ $purchaseDetail->amount }}</td>
											<td>{{ $purchaseDetail->price }}</td>
											<td>{{ $purchaseDetail->total }}</td>

                                            <td>
                                                <form action="{{ route('purchase-details.destroy',$purchaseDetail->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('purchase-details.show',$purchaseDetail->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('purchase-details.edit',$purchaseDetail->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $purchaseDetails->links() !!}
            </div>
        </div>
    </div>
@endsection
