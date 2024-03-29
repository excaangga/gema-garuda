<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportGovResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'id_user' => $this->id_user,
            'user_name' => $this->user->name,
            'user_nickname' => $this->user->nickname,
            'user_category' => $this->user->category->category_name,
            'id_province' => $this->user->id_province,
            'id_regency' => $this->user->id_regency,
            'id_district' => $this->user->id_district,
            'id_village' => $this->user->id_village,
            'report_text' => $this->report_text,
            'report_image_link' => $this->report_image_link,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
