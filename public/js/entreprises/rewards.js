const rewardType = document.getElementById('reward_type');
const pointesSection = document.getElementById('pointes_section');
const bountySection = document.getElementById('bounty_section');

rewardType.addEventListener('change', function () {
    if (this.value === 'pointes') {
        pointesSection.classList.remove('hidden');
        bountySection.classList.add('hidden');
    } else {
        pointesSection.classList.add('hidden');
        bountySection.classList.remove('hidden');
    }
});