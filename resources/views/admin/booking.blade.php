<head>
    @include('admin.css')
</head>

@php
    $action_icons = [
        "icon:check | click:redirect('/approve_book/{id}') | color:green",
        "icon:no-symbol | click:redirect('/reject_book/{id}') | color:pink",
        "icon:trash | color:red | click:deleteBooking({id} , '{name}')",
    ];
@endphp

@include('admin.header')
@include('admin.sidebar')
<!-- Sidebar Navigation end-->
<div class="page-content">
    <div class="page-header p-0">

        {{-- BladewindUI --}}
        <x-bladewind::table searchable="true" :data="$bookings" divider="thin"
            search_placeholder="Find staff members by name..." :action_icons="$action_icons"
            no_data_message="The staff directory is empty" hover_effect="true" exclude_columns="id, marital_status" />
        <x-bladewind.modal okButtonAction="deleteConfirmButton()" name="delete-booking" type="error"
            title="Confirm User Deletion">
            Are you really sure you want to delete <b class="title"></b>?
            This action cannot be reversed.
        </x-bladewind.modal>
    </div>
</div>

@include('admin.footer')




<script>
    let deleteConfirmButton;

    const deleteBooking = (id, name) => {
        showModal('delete-booking')

        deleteConfirmButton = () => {
            window.location.href = window.origin + `/delete_booking/${id}`
        }
    }

    const redirect = (url) => {
        window.open(url);
    }
</script>
