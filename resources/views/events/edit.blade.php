@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="card border-0">
            <div class="card-header custom-card-header fs-4">
                Edit event
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Errors:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    {!! Form::model($event, ['method' => 'PATCH','route' =>
    ['events.update', $event->id]]) !!}
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Event Details</h5>
                        <div class="mt-3">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value ="{{ $event->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $event->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" value ="{{ $event->location }}">
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Img</label>
                                <input type="text" class="form-control" id="img" name="img" value ="{{ $event->img }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Contact</h5>
                        <div class="mt-3">
                            @csrf
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" value ="{{ $contact[0]->firstName }}">
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" value = "{{ $contact[0]->lastName }}">
                            </div>
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value ="{{ $contact[0]->phoneNumber }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value = "{{ $contact[0]->email }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Speakers</h5>
                        <label for="speaker" class="form-label">Select Speakers</label>
                        <select class="form-select" id="speaker" name="speaker[]" multiple>
                            <option disabled>Select Speakers</option>
                            @foreach ($speakers as $speaker)
                                <option value="{{ $speaker->id }}">{{ $speaker->firstName }} {{ $speaker->lastName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Partners</h5>
                        <div class="mb-3">
                            <label for="partner" class="form-label">Select Partners</label>
                            <select class="form-select" id="partner" name="partner[]" multiple>
                                <option disabled>Select Partners</option>
                                @foreach ($partners as $partner)
                                    <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Activities</h5>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Event Start Date *</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Event End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>
                        <div id="dayActivitiesContainer"></div>
                    </div>
                </div>



                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('events.index') }}" class="btn btn-default">Cancel</a>
                </div>
                    {!! Form::close() !!}

            </div>


            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const dayActivitiesContainer = document.getElementById('dayActivitiesContainer');
                    const startDateInput = document.getElementById('start_date');
                    const endDateInput = document.getElementById('end_date');
                    const speakerSelect = document.getElementById('speaker');

                    startDateInput.addEventListener('change', generateDayActivities);
                    endDateInput.addEventListener('change', generateDayActivities);



                    function generateDayActivities() {
                        const startDate = new Date(startDateInput.value);
                        const endDate = new Date(endDateInput.value);

                        if (!startDate || !endDate || startDate > endDate) {
                            return;
                        }

                        dayActivitiesContainer.innerHTML = '';

                        for (let currentDate = new Date(startDate), dayCounter = 1; currentDate <= endDate; currentDate.setDate(currentDate.getDate() + 1), dayCounter++) {
                            (function (currentDate, dayCounter) {
                                const dayCard = document.createElement('div');
                                dayCard.classList.add('card', 'mb-3');

                                const cardBody = document.createElement('div');
                                cardBody.classList.add('card-body');

                                const dayLabel = document.createElement('h5');
                                dayLabel.classList.add('card-title');
                                dayLabel.textContent = `Day ${dayCounter}`;
                                cardBody.appendChild(dayLabel);

                                const activitiesInput = document.createElement('input');
                                activitiesInput.classList.add('form-control');
                                activitiesInput.type = 'number';
                                activitiesInput.min = '0';
                                activitiesInput.name = `day_${dayCounter}_activities`;
                                activitiesInput.placeholder = 'Number of activities';
                                cardBody.appendChild(activitiesInput);

                                const activitiesContainer = document.createElement('div');
                                activitiesContainer.classList.add('activities-container');
                                cardBody.appendChild(activitiesContainer);

                                activitiesInput.addEventListener('change', function () {
                                    const currentDateCopy = new Date(currentDate.valueOf());
                                    createActivityFields(currentDateCopy, activitiesInput.value, activitiesContainer, dayCounter);
                                });

                                dayCard.appendChild(cardBody);
                                dayActivitiesContainer.appendChild(dayCard);
                            })(currentDate, dayCounter);
                        }
                    }

                    function createActivityFields(date, numOfActivities, container, dayCounter) {
                        container.innerHTML = '';

                        for (let i = 1; i <= numOfActivities; i++) {
                            const activityDiv = document.createElement('div');
                            activityDiv.classList.add('mb-3');

                            const activityLabel = document.createElement('label');
                            activityLabel.textContent = `Activity ${i}`;
                            activityDiv.appendChild(activityLabel);

                            const activityInput = document.createElement('input');
                            activityInput.classList.add('form-control');
                            activityInput.type = 'text';
                            activityInput.name = `day_${dayCounter}_activity_${i}`; // Use dayCounter instead of formatted date key
                            activityInput.placeholder = `Activity ${i}`;
                            activityDiv.appendChild(activityInput);

                            const hourLabel = document.createElement('label');
                            hourLabel.textContent = `Hour for Activity ${i}`;
                            activityDiv.appendChild(hourLabel);

                            const hourInput = document.createElement('input');
                            hourInput.classList.add('form-control');
                            hourInput.type = 'time';
                            hourInput.name = `day_${dayCounter}_hour_${i}`; // Use dayCounter instead of formatted date key
                            activityDiv.appendChild(hourInput);

                            const selectSpeakerLabel = document.createElement('label');
                            selectSpeakerLabel.textContent = `Select Speaker for Activity ${i}`;
                            activityDiv.appendChild(selectSpeakerLabel);

                            const selectSpeaker = document.createElement('select');
                            selectSpeaker.classList.add('form-select');
                            selectSpeaker.name = `day_${dayCounter}_speaker_${i}`; // Use dayCounter instead of formatted date key
                            selectSpeaker.multiple = false;

                            const selectSpeakerOption = document.createElement('option');
                            selectSpeakerOption.value = '';
                            selectSpeakerOption.textContent = 'Select Speaker';
                            selectSpeakerOption.disabled = true;
                            selectSpeaker.appendChild(selectSpeakerOption);

                            Array.from(speakerSelect.selectedOptions).forEach(option => {
                                const speakerOption = document.createElement('option');
                                speakerOption.value = option.value;
                                speakerOption.textContent = option.textContent;
                                selectSpeaker.appendChild(speakerOption);
                            });

                            activityDiv.appendChild(selectSpeaker);
                            container.appendChild(activityDiv);

                        }
                    }
                });
            </script>

@endsection
