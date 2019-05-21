<?php

namespace Modules\Ibooking\Repositories\Eloquent;

use Modules\Ibooking\Repositories\EventRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

use Modules\Ibooking\Events\EventWasCreated;
use Modules\Ibooking\Events\EventWasUpdated;
use Modules\Ibooking\Events\EventWasDeleted;

class EloquentEventRepository extends EloquentBaseRepository implements EventRepository
{

    public function create($data)
    {

        $event = $this->model->create($data);

        event(new EventWasCreated($event, $data));

        return $event;
    }

    public function update($event, $data)
    {
        $event->update($data);

        event(new EventWasUpdated($event, $data));

        return $event;
    }

    public function destroy($event)
    {
        event(new EventWasDeleted($event));

        return $event->delete();
    }

}
