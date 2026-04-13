const fs = require('fs');
const path = require('path');
const { format } = require('date-fns');
const { v4: uuidv4 } = require('uuid');

const logError = async (err) => {
  const logId = uuidv4();
  const timestamp = format(new Date(), 'yyyy-MM-dd HH:mm:ss');
  const errorEntry = `${logId} \t [${timestamp}] \t ${err.name} \t ${err.message}\n`;
  const logsDir = path.join(__dirname, '..', 'logs');
  const logFile = path.join(logsDir, 'errorLog.txt');

  try {
    if (!fs.existsSync(logsDir)) {
      fs.mkdirSync(logsDir, { recursive: true });
    }
    await fs.promises.appendFile(logFile, errorEntry);
  } catch (writeErr) {
    console.error('Failed to write error log:', writeErr);
  }
};

const errorHandler = (err, req, res, next) => {
  logError(err);
  console.error(err.stack);
  res.status(err.status || 500).json({ error: 'Internal Server Error', message: err.message });
};

module.exports = errorHandler;
