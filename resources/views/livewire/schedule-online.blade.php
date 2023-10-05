@section('title')
    <title>{{ $title }}</title>
@endsection

<div class="p-6 text-gray-900">
    @if(Session::has('success'))
        <div role="alert" class="mb-3">
            <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                Success
            </div>
            <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
                <p>{{ Session::get('message')}}</p>
            </div>
        </div>
    @endif
    @if(Session::has('error'))
        <div role="alert" class="mb-3">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Error
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>{{ Session::get('message')}}</p>
            </div>
        </div>
    @endif
    <form wire:submit.prevent='store'>
        <div>
            {{ Form::select('service_need', ['' => 'Choose a Service', 'residential' => 'Residential Air Duct Cleaning', 'commercial' => 'Commercial Air Duct Cleaning'], null, ['id' => 'service_need', 'wire:model' => 'formData.service_need', 'class' => 'bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'])}}
        </div>

        <!-- First Name -->
        <div>
            {{ Form::text('first_name', null, ['id' => 'address', 'wire:model.defer' => 'formData.first_name', 'class' => 'block mt-1 mb-2 w-full', 'placeholder' => 'Enter your first name'])}}
        </div>

        <!-- Last Name -->
        <div>
            {{ Form::text('last_name', null, ['id' => 'last_name', 'wire:model.defer' => 'formData.last_name', 'class' => 'block mt-1 mb-2 w-full', 'placeholder' => 'Enter your last name'])}}
        </div>

        <!-- Zip -->
        <div>
            {{ Form::text('zip', null, ['id' => 'zip', 'wire:model.defer' => 'formData.zip', 'class' => 'block mt-1 mb-2 w-full', 'placeholder' => 'Enter your zip code'])}}
        </div>

        <!-- City -->
        <div>
            {{ Form::text('city', null, ['id' => 'city', 'wire:model.defer' => 'formData.city', 'class' => 'block mt-1 mb-2 w-full', 'placeholder' => 'Enter your city'])}}
        </div>

        <!-- Address -->
        <div>
            {{ Form::text('address', null, ['id' => 'address', 'wire:model.defer' => 'formData.address', 'class' => 'block mt-1 mb-2 w-full', 'placeholder' => 'Enter your address'])}}
        </div>

        <!-- Phone -->
        <div>
            {{ Form::text('phone_no', null, ['id' => 'phone_no', 'wire:model.defer' => 'formData.phone_no', 'class' => 'block mt-1 mb-2 w-full', 'placeholder' => 'Enter your phone'])}}
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            {{ Form::text('email', null, ['id' => 'email', 'wire:model.defer' => 'formData.email', 'class' => 'block mt-1 mb-2 w-full', 'placeholder' => 'Enter your email'])}}
        </div>

        <!-- Description -->
        <div>
            {{ Form::textarea('description', null, ['id' => 'description', 'rows' => '5', 'wire:model.defer' => 'formData.description', 'class' => 'block mt-1 mb-2 w-full', 'placeholder' => 'How did you first hear about Amistee.?'])}}
        </div>

        <!-- Reschedule -->
        <div>
            {{ Form::select('reschedule', ['' => 'Are you rescheduling an existing appointment.?'] + $yes_no, null, ['id' => 'reschedule', 'wire:model' => 'formData.reschedule', 'class' => 'bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'])}}
        </div>

        <!-- Living Space -->
        <div>
            {{ Form::text('sq_footage', null, ['id' => 'sq_footage', 'wire:model.lazy' => 'formData.sq_footage', 'class' => 'block mt-1 mb-2 w-full', 'placeholder' => 'Approx. Sq. Footage of Living Space (Not Including Basement)*'])}}
        </div>

        <!-- Number of Furance -->
        <div>
            {{ Form::select('number_of_furance', ['' => 'Select Number of Furnace'] + $numberOfFurance, null, ['id' => 'number_of_furance', 'wire:model' => 'formData.number_of_furance', 'class' => 'bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'])}}
        </div>

        <!-- Number of Furance -->
        <div>
            {{ Form::select('location_of_furance', ['' => 'Select Location of your Furnace'] + $locationOfFurance, null, ['id' => 'location_of_furance', 'wire:model' => 'formData.location_of_furance', 'class' => 'bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'])}}
        </div>

        <!-- Dryer Vent Cleaning -->
        <div>
            {{ Form::select('dryer_vent_cleaning', ['' => 'Select Dryer Vent Cleaning'] + $yes_no, null, ['id' => 'dryer_vent_cleaning', 'wire:model' => 'formData.dryer_vent_cleaning', 'class' => 'bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'])}}
        </div>

         <!-- Dryer Vent Cleaning -->
         @if(isset($formData['dryer_vent_cleaning']) && $formData['dryer_vent_cleaning'] == 'yes')
            <div>
                {{ Form::select('dryer_vent_exit_point', ['' => 'Exit Point of your Dryer Vent'] + $dryerVents, null, ['id' => 'dryer_vent_exit_point', 'wire:model' => 'formData.dryer_vent_exit_point',  'class' => 'bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }}
            </div>
         @endif

         <!-- YOUR QUOTE -->
         <div>
            YOUR QUOTE

            <p>AIR DUCT CLEANING QUOTE: $ {{ $airDuctPrice }}</p>
            @if((isset($formData['dryer_vent_cleaning']) && $formData['dryer_vent_cleaning'] == 'yes') && (isset($formData['dryer_vent_exit_point'])))
                <p>DRYER VENT CLEANING QUOTE: $ {{ $dryerVentlPrice }}</p>
            @endif
            <p>TOTAL: $ {{ $finalPrice }}</p>
         </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</div>
