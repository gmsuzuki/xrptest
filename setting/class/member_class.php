<?php 

// profile
class memberProfileManager

{
    private $memberNumber;
    private $memberName;
    private $memberPhone;
    private $memberEmail;
    private $memberIcon;
    private $approval;


    public function __construct($data = [])
    {
        $this->memberNumber = isset($data['memberNumber']) ? $data['memberNumber'] : null;
        $this->memberName = isset($data['memberName']) ? $data['memberName'] : null;
        $this->memberPhone = isset($data['memberPhone']) ? $data['memberPhone'] : null;
        $this->memberEmail = isset($data['memberEmail']) ? $data['memberEmail'] : null;
        $this->memberIcon = isset($data['memberIcon']) ? $data['memberIcon'] : null;
        $this->approval = isset($data['approval']) ? $data['approval'] : false;
    }

    // ゲッターとセッター

    public function getApproval() {
        return $this->approval;
    }

    public function setApproval($approval) {
        $this->approval = $approval;
    }

    public function getMemberNumber() {
        return $this->memberNumber;
    }

    public function setMemberNumber($memberNumber) {
        $this->memberNumber = $memberNumber;
    }

    public function getMemberName() {
        return $this->memberName;
    }

    public function setMemberName($memberName) {
        $this->memberName = $memberName;
    }

    public function getMemberPhone() {
        return $this->memberPhone;
    }

    public function setMemberPhone($memberPhone) {
        $this->memberPhone = $memberPhone;
    }

    public function getMemberEmail() {
        return $this->memberEmail;
    }

    public function setMemberEmail($memberEmail) {
        $this->memberEmail = $memberEmail;
    }

    public function getMemberIcon() {
        return $this->memberIcon;
    }

    public function setMemberIcon($memberIcon) {
        $this->memberIcon = $memberIcon;
    }
}

function getMemberProfile(array $staffarry, $targetMemberNumber) {
    foreach ($staffarry as $member) {
        if ($member instanceof memberProfileManager && $member->getMemberNumber() == $targetMemberNumber) {
            return [
                "memberName" => $member->getMemberName(),
                "memberIcon" => $member->getMemberIcon()
            ];
        }
    }
    return null; // 該当するメンバーが見つからなかった場合
}