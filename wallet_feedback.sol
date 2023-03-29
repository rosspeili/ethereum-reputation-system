pragma solidity ^0.8.0;

contract WalletFeedback {
    mapping(address => uint256) public positiveFeedback;
    mapping(address => uint256) public negativeFeedback;
    
    event PositiveFeedback(address indexed wallet, uint256 count);
    event NegativeFeedback(address indexed wallet, uint256 count);
    
    function recommend(address wallet) public {
        positiveFeedback[wallet]++;
        emit PositiveFeedback(wallet, positiveFeedback[wallet]);
    }
    
    function report(address wallet) public {
        negativeFeedback[wallet]++;
        emit NegativeFeedback(wallet, negativeFeedback[wallet]);
    }
}
