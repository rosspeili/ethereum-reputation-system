pragma solidity ^0.8.0;

contract ReputationSystem {
    mapping(address => uint256) public reputationScore;
    mapping(address => mapping(address => bool)) public hasVoted;

    event Vote(address indexed voter, address indexed subject, uint256 indexed score);

    function vote(address _subject, uint256 _score) public {
        require(_score >= 0 && _score <= 5, "Invalid score");
        require(!hasVoted[msg.sender][_subject], "Already voted");
        reputationScore[_subject] += _score;
        hasVoted[msg.sender][_subject] = true;
        emit Vote(msg.sender, _subject, _score);
    }

    function getReputationScore(address _subject) public view returns (uint256) {
        return reputationScore[_subject];
    }
}
